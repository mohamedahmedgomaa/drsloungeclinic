<?php

namespace App\Http\Livewire\Admin\Subscribe;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subscribe as ModelSubscribe;

class Subscribe extends Component
{
    use WithPagination;
    public $search;
    public $sortField;
    public $sortAsc = true;
    public $lang = 'en';

    protected $queryString = ['search', 'sortField', 'sortAsc'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [ 'closemodel' => 'closemodal' ];

    public function sortBy($field)
    {
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        $items = ModelSubscribe::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('subscribe_status', 'LIKE', '%' . $this->search . '%')
            ->orWhere('user_subscribe', 'LIKE', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate(50);

        return view('livewire.admin.subscribe.subscribe', [
            'items' => $items,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
