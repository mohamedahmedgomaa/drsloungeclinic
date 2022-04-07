<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\OrderStatus;
use App\Models\ProductCategory;
use App\Models\Order as ModelOrder;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use App\Models\Tag;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $Id = "";
    public $name = "";
    public $email = "";
    public $phone = "";
    public $platform = "";
    public $order_status_id = "";
    public $orderDetails = [];
    public $total = 0;
    public $showEditModal = FALSE;
    public $showDeleteModal = FALSE;
    public $search;
    public $sortField;
    public $sortAsc = TRUE;
    public $lang = 'en';
    protected $queryString = ['search', 'sortField', 'sortAsc'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['closemodel' => 'closemodal'];

    public function show($id)
    {
        $this->resetValidation();
        $this->showEditModal = TRUE;
        $this->Id = $id;
        $item = ModelOrder::find($this->Id);
        $this->name = $item->name;
        $this->email = $item->email;
        $this->phone = $item->phone;
        $this->order_status_id = $item->order_status_id;
        $this->platform = $item->platform;

        $this->orderDetails = $item->orderDetails;

        foreach ($this->orderDetails as $orderDetail) {
            $this->total += $orderDetail->price * $orderDetail->qty;
        }


    }

    public function closemodal()
    {
        $this->resetValidation();
        $this->Id = "";
        $this->showEditModal = FALSE;
        $this->showDeleteModal = FALSE;
        $this->resetForm();
        $this->render();
    }

    public function sortBy($field, $lang)
    {
        $this->lang = $lang;
        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = TRUE;
        }
        $this->sortField = $field;
    }

    protected function rules()
    {
        $rules = [
            'order_status_id' => 'required|exists:order_statuses,id,deleted_at,NULL',
        ];
        return $rules;
    }
    private function resetForm()
    {
        $this->resetValidation();
        $this->order_status_id = "";
    }

    public function updateStatus()
    {
        $data = $this->validate();

        $item = ModelOrder::find($this->Id);
        $item->update([
            'order_status_id' => $data['order_status_id'],
        ]);

        $this->resetForm();
        $this->Id = '';
        $this->showEditModal = FALSE;
        $this->render();
    }

    public function render()
    {
        $orderStatuses = OrderStatus::where('active', 1)->listsTranslations('name')->pluck('name', 'id')->toArray();;

        $items = ModelOrder::where('name', 'LIKE', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->translatedIn($this->lang)->orderByTranslation(
                    $this->sortField,
                    $this->sortAsc ? 'asc' : 'desc'
                );
            })
            ->paginate(10);

        return view('livewire.admin.order.order', [
            'items' => $items,
            'orderStatuses' => $orderStatuses,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
