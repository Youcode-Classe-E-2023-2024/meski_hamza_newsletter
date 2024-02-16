<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;

use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 8;
    public $admin = '';

    public $sortBy = 'name';
    public $sortDirection = 'DESC';

    public function delete(User $user) {
        $user->delete();
    }

    public function setSortBy($field) {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortBy = $field;
    }

    public function render()
    {
        $users = User::search($this->search)
            ->when($this->admin !== '', function($query) {
                $query->where('is_admin', $this->admin);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.dashboard',compact('users'));
    }
}
