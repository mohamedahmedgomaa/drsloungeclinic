<?php

namespace App\Http\Livewire\Admin\ProductSubSubCategory;

use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory as ModelProductSubSubCategory;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductSubSubCategory extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $product_sub_category_id = '';
    public $name_ar;
    public $name_en;
    public $image;
    public $Id = "";
    public $showEditModal = FALSE;
    public $showDeleteModal = FALSE;
    public $search;
    public $sortField;
    public $sortAsc = TRUE;
    public $lang = 'en';
    protected $queryString = ['search', 'sortField', 'sortAsc'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['closemodel' => 'closemodal'];

    protected function rules()
    {
        if ($this->Id == "") {
            $rules = [
                'product_sub_category_id' => 'required|exists:product_categories,id,deleted_at,NULL',
                'name_ar' => 'required',
                'name_en' => 'required',
                'image' => 'required|image',
            ];
        } else {
            $rules = [
                'product_sub_category_id' => 'required|exists:product_categories,id,deleted_at,NULL',
                'name_ar' => 'required',
                'name_en' => 'required',
            ];
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetForm()
    {
        $this->resetValidation();
        $this->product_sub_category_id = '';
        $this->name_ar = "";
        $this->name_en = "";
        $this->image = "";
    }

    public function create()
    {
        $data = $this->validate();
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/productSubSubCategories/' . $imagename);
        }
        ModelProductSubSubCategory::create([
            'ar' => [
                'name' => $data['name_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
            ],
            'product_sub_category_id' => $data['product_sub_category_id'],
            'image' => isset($imagename) ? $imagename : NULL,
        ]);
        $this->resetForm();
        $this->render();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->showEditModal = TRUE;
        $this->Id = $id;
        $item = ModelProductSubSubCategory::findOrFail($this->Id);
        $this->name_ar = $item->{'name:ar'};
        $this->name_en = $item->{'name:en'};
        $this->product_sub_category_id = $item->product_sub_category_id;
    }

    public function update()
    {
        $data = $this->validate();
        $item = ModelProductSubSubCategory::findOrFail($this->Id);
        $oldimage = $item->image;
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/productSubSubCategories/' . $imagename);
        }
        $item->update([
            'ar' => [
                'name' => $data['name_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
            ],
            'product_sub_category_id' => $data['product_sub_category_id'],
            'image' => isset($imagename) ? $imagename : $oldimage,
        ]);
        $this->resetForm();
        $this->Id = '';
        $this->showEditModal = FALSE;
        $this->render();
    }

    public function delete($id)
    {
        $this->Id = $id;
        $this->showDeleteModal = TRUE;
        $this->render();
    }

    public function destroy()
    {
        ModelProductSubSubCategory::destroy($this->Id);
        $this->Id;
        $this->showDeleteModal = FALSE;
        $this->render();
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


    public function render()
    {
        $product_sub_categories = ProductSubCategory::listsTranslations('name')->pluck('name', 'id')->toArray();
        $items = ModelProductSubSubCategory::whereTranslationLike('name', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->translatedIn($this->lang)->orderByTranslation(
                    $this->sortField,
                    $this->sortAsc ? 'asc' : 'desc'
                );
            })
            ->paginate(10);

        return view('livewire.admin.product-sub-sub-category.product-sub-sub-category', [
            'items' => $items,
            'product_sub_categories' => $product_sub_categories,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
