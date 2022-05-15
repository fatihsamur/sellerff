<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Model\{Order};
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDF;

class OrderProcess extends Component
{
    use WithPagination, LivewireAlert;
    public $search;
    public $activeFilter;
    public $boxLabelUrl;
    public $showBox = [];
    public $showBoxInstruction = [];
    public $sktRequired = [];


    public function mount()
    {
        $orders = Order::with(['order_items'])->get();
        foreach ($orders as $order) {
            foreach ($order->order_items as $item_key => $order_item) {
                $this->sktRequired[$order_item->order_id][$item_key] = $order_item->skt_required;
            }
        }
        $this->search = 'ORDER#';
    }
    public function updatedActiveFilter($value)
    {
        if (!is_array($this->activeFilter)) {
            return;
        }
        $this->activeFilter = array_filter($this->activeFilter, function ($filter) {
            return $filter != false;
        });
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function updatingSktRequired($name, $value)
    {
        $order_arr = explode('.', $value);
        $order_items = Order::find($order_arr[0])->order_items()->get();
        foreach ($order_items as $order_itemkey => $order_item) {
            if ($order_itemkey == $order_arr[1]) {
                $order_item->skt_required = !$order_item->skt_required;
                $order_item->save();
            }
        }
    }

    /*   public function showLabel($label)
    {
      if(!$label) return $this->alert('error', 'Label Girilmemiş', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
      $labelFile = public_path('storage/label/' . $label);
      if (!file_exists($labelFile)) {
        $this->alert('error', 'Label Bulunamadı', [
          'position' => 'top-end',
          'timer' => 5000,
          'toast' => true,
          'timerProgressBar' => true
        ]);
        return false;
      }

      return response()->download($labelFile);
    }

    public function showBoxLabel($boxlabel){
      if(!$boxlabel) return $this->alert('error', 'Box Label Girilmemiş', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
      $labelFile = public_path('storage/boxlabel/' . $boxlabel);
      if (!file_exists($labelFile)) {
        $this->alert('error', 'Box Label Bulunamadı', [
          'position' => 'top-end',
          'timer' => 5000,
          'toast' => true,
          'timerProgressBar' => true
        ]);
        return false;
      }

      return response()->download($labelFile);

    } */

    public function toggleShowBox($order_id)
    {
        if (isset($this->showBox[$order_id])) {
            $this->showBox[$order_id] = !$this->showBox[$order_id];
            return;
        }
        $this->showBox[$order_id] = true;
    }

    public function toggleShowBoxInstruction($order_id)
    {
        if (isset($this->showBoxInstruction[$order_id])) {
            $this->showBoxInstruction[$order_id] = !$this->showBoxInstruction[$order_id];
            return;
        }
        $this->showBoxInstruction[$order_id] = true;
    }



    public function render()
    {
        $order = Order::with(['order_items.box','country'])
      ->when($this->search && preg_match('/USER/', $this->search), function ($query) {
          $search = explode('#', $this->search)[1] ??'';
          return $query->where('user_id', 'like', "%{$search}%");
      })
      ->when($this->search && preg_match('/ORDER/', $this->search), function ($query) {
          $search = explode('#', $this->search)[1] ??'';
          return $query->where('warehouse_address', 'like', "%{$search}%");
      })

      ->when($this->search && preg_match('/ORDERITEM/', $this->search), function ($query) {
          $search = explode('#', $this->search)[1] ??'';
          return $query->whereHas('order_items', function ($query) use ($search) {
              return $query->where('unique_identifier', 'like', "%{$search}%");
          });
      })
      ->when($this->search && preg_match('/BOX/', $this->search), function ($query) {
          $search = explode('#', $this->search)[1] ?? '';
          return $query->whereHas('boxes', function ($query) use ($search) {
              return $query->where('id', 'like', "%{$search}%");
          });
      })
      ->when($this->search && preg_match('/FBA/', $this->search), function ($query) {
          $search = explode('#', $this->search)[1] ?? '';
          return $query->where('warehouse_address', 'like', "%{$search}%");
      })
      ->when($this->activeFilter, function ($query) {
          return $query->whereIn('status', $this->activeFilter);
      })
      ->paginate(5);
        $order_c = Order::all();


        return view('livewire.order-process', [
      'orders' =>
      $order,
      'order_c' => $order_c,
    ]);
    }
}
