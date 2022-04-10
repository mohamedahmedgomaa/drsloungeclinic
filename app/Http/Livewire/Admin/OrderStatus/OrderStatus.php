<?php

namespace App\Http\Livewire\Admin\OrderStatus;

use App\Models\OrderStatus as ModelOrderStatus;
use Livewire\Component;
use Livewire\WithPagination;

class OrderStatus extends Component
{
    use WithPagination;

    public $name_ar;
    public $name_en;
    public $Id;
    public $showEditModal = FALSE;
    public $showDeleteModal = FALSE;
    public $search;
    public $sortField;
    public $sortAsc = TRUE;
    public $lang = 'en';
    protected $queryString = ['search', 'sortField', 'sortAsc'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['closemodel' => 'closemodal'];
    protected $rules = [
        'name_ar' => 'required',
        'name_en' => 'required',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    private function resetForm() {
        $this->resetValidation();
        $this->name_ar = "";
        $this->name_en = "";
    }

    public function create() {
        $data = $this->validate();
        ModelOrderStatus::create([
            'ar' => [
                'name' => $data['name_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
            ],
            'active' => 1
        ]);
        $this->resetForm();
        $this->render();
    }

    public function edit($id) {
        $this->resetValidation();
        $this->showEditModal = TRUE;
        $this->Id            = $id;
        $item                = ModelOrderStatus::findOrFail($this->Id);
        $this->name_ar       = $item->{'name:ar'};
        $this->name_en       = $item->{'name:en'};
    }

    public function update() {
        $data = $this->validate();
        $item = ModelOrderStatus::findOrFail($this->Id);
        $item->update([
            'ar' => [
                'name' => $data['name_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
            ],
        ]);
        $this->resetForm();
        $this->Id;
        $this->showEditModal = FALSE;
        $this->render();
    }

    public function delete($id) {
        $this->Id              = $id;
        $this->showDeleteModal = TRUE;
        $this->render();
    }

    public function destroy() {
        ModelOrderStatus::destroy($this->Id);
        $this->Id;
        $this->showDeleteModal = FALSE;
        $this->render();
    }

    public function active($id) {
        $plan         = ModelOrderStatus::find($id);
        $plan->active = 1;
        $plan->save();
    }

    public function inactive($id) {
        $plan         = ModelOrderStatus::find($id);
        $plan->active = 0;
        $plan->save();
    }

    public function closemodal() {
        $this->resetValidation();
        $this->Id;
        $this->showEditModal   = FALSE;
        $this->showDeleteModal = FALSE;
        $this->resetForm();
        $this->render();
    }

    public function sortBy($field, $lang) {
        $this->lang = $lang;
        if ($this->sortField == $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = TRUE;
        }
        $this->sortField = $field;
    }

    public function render() {
        $items = ModelOrderStatus::whereTranslationLike('name', '%'.$this->search.'%')
            ->when($this->sortField, function ($query) {
                $query->translatedIn($this->lang)->orderByTranslation(
                    $this->sortField,
                    $this->sortAsc ? 'asc' : 'desc'
                );
            })
            ->paginate(10);

        return view('livewire.admin.order-status.order-status', [
            'items' => $items,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
