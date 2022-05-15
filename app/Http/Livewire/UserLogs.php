<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\UserActivity;
use Livewire\WithPagination;

class UserLogs extends Component
{
    public $activeFilter;
    public $user_id;
    use WithPagination;

    public function mount($id)
    {
        $this->user_id = $id;
    }
    public function render()
    {
        $logs = UserActivity::with('user')->where('user_id', $this->user_id)
        ->when($this->activeFilter, function ($query) {
            return $query->whereIn('activity_type', $this->activeFilter);
        })
        ->paginate(10);
        return view('livewire.user-logs', ['logs' => $logs ]);
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
}
