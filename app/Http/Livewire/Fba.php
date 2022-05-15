<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use Livewire\WithPagination;
use App\Model\{Order};

class Fba extends BaseComponent
{
    use WithPagination;
    public $search;
    public $activeFilter;
    public $showBoxInstruction = [];


    public function toggleShowBoxInstruction($order_id)
    {
        if (isset($this->showBoxInstruction[$order_id])) {
            $this->showBoxInstruction[$order_id] = !$this->showBoxInstruction[$order_id];
            return;
        }
        $this->showBoxInstruction[$order_id] = true;
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


    public function render()
    {
        $order = auth()->user()->orders()
      ->with('order_items')
      ->when($this->activeFilter, function ($query) {
          return $query->whereIn('status', $this->activeFilter);
      })
      ->when($this->search, function ($query) {
          return $query->where('id', $this->search);
      })
    ->when(!$this->activeFilter, function ($query) {
        return $query->where('status', '!=', 'İptal Edildi');
    })
    ->orderBy('id', 'desc')
    ->paginate(5)
      ;
        return view('livewire.fba', [
      'orders' =>
      $order
    ]);
    }


    public function payOrder($order_id)
    {
        $user = auth()->user();
        $order = Order::find($order_id);

        if ($user->balance >= $order->order_total) {
            $user->balance -= $order->order_total;
            $user->save();
            $order->status = 'Eksik Bilgileri Tamamlayın';
            $order->save();
            $this->alert('success', 'Siparişinizin Ödeme İşlemi Tamamlandı', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
            return;
        }
        $this->alert('error', 'İşlem Başarısız', [
      'position' => 'top-end',
      'timer' => 5000,
      'toast' => true,
      'timerProgressBar' => true
    ]);
    }
}
