<?php

namespace App\Http\Livewire\Admin\UserBook;

use App\Models\OrderStatus;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UserBook as ModelUserBook;
class UserBook extends Component
{
    use WithPagination;
    public $name = '';
    public $phone = '';
    public $email = '';
    public $service = '';
    public $order_status_id = '';
    public $Id;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $search;
    public $sortField;
    public $sortAsc = true;
    public $lang = 'en';

    protected $queryString = ['search', 'sortField', 'sortAsc'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [ 'closemodel' => 'closemodal' ];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'service' => 'required',
        'order_status_id' => 'nullable',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->resetValidation();
        $this->email = "";
        $this->phone = "";
        $this->name = "";
        $this->service = "";
    }

    public function create()
    {
        $data = $this->validate();
        $alldata = ModelUserBook::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service'],
            'order_status_id' => 1,
        ]);

        $this->resetForm();
        $this->render();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->showEditModal = true;
        $this->Id = $id;
        $item = ModelUserBook::find($this->Id);
        $this->name = $item->{'name'};
        $this->email = $item->{'email'};
        $this->phone = $item->phone;
        $this->service = $item->service;
        $this->order_status_id = $item->order_status_id;
    }

    public function update()
    {
        $data = $this->validate();
        $item = ModelUserBook::find($this->Id);
        $item->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service'],
            'order_status_id' => $data['order_status_id'],
        ]);
        $this->resetForm();
        $this->emit('updatesurvise');
        $this->Id;
        $this->showEditModal = false;
        $this->render();
    }

    public function delete($id)
    {
        $this->Id = $id;
        $this->showDeleteModal = true;
        $this->render();
    }

    public function destroy()
    {
        ModelUserBook::destroy($this->Id);
        $this->Id;
        $this->showDeleteModal = false;
        $this->render();
    }

    public function closemodal()
    {
        $this->resetValidation();
        $this->Id;
        $this->showEditModal = false;
        $this->showDeleteModal = false;
        $this->resetForm();
        $this->render();
    }

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
        $orderStatuses = OrderStatus::where('active', 1)->listsTranslations('name')->pluck('name', 'id')->toArray();;

        $items = ModelUserBook::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('service', 'LIKE', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })
            ->paginate(50);

        return view('livewire.admin.user-book.user-book', [
            'items' => $items,
            'orderStatuses' => $orderStatuses,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
