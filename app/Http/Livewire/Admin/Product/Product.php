<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductCampaign;
use App\Models\ProductCategory;
use App\Models\Product as ModelProduct;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use App\Models\Tag;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $product_category_id = '';
    public $name_ar;
    public $name_en;
    public $description_ar;
    public $description_en;
    public $image;
    public $status;
    public $qty;
    public $price;
    public $product_sub_category_id;
    public $product_sub_sub_category_id;
    public $purchases_limits;
    public $stock;
    public $expire;
    public $discount;
    public $tags = [];
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
                'product_category_id' => 'required|exists:product_categories,id,deleted_at,NULL',
                'product_sub_category_id' => 'required|exists:product_sub_categories,id,deleted_at,NULL',
                'product_sub_sub_category_id' => 'required|exists:product_sub_sub_categories,id,deleted_at,NULL',
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'qty' => 'required',
                'image' => 'required|image',
                'price' => 'required',
                'tags' => 'required|array',
                'tags.*' => 'required|exists:tags,id,deleted_at,NULL',

            ];
        } else {
            $rules = [
                'product_category_id' => 'required|exists:product_categories,id,deleted_at,NULL',
                'product_sub_category_id' => 'required|exists:product_sub_categories,id,deleted_at,NULL',
                'product_sub_sub_category_id' => 'required|exists:product_sub_sub_categories,id,deleted_at,NULL',
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'price' => 'required',
                'qty' => 'required',
                'image' => 'nullable|image',
                'status' => 'required|in:waiting,active,refused',
                'tags' => 'nullable|array',
                'tags.*' => 'nullable|exists:tags,id,deleted_at,NULL',
                'purchases_limits' => 'nullable',
                'stock' => 'nullable|required_with:purchases_limits',
                'expire' => 'nullable|date',
                'discount' => 'nullable|required_with:purchases_limits',
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
        $this->name_ar = "";
        $this->name_en = "";
        $this->description_ar = "";
        $this->description_en = "";
        $this->image = "";
        $this->price = "";
        $this->product_category_id = '';
        $this->product_sub_category_id = "";
        $this->product_sub_sub_category_id = "";
        $this->qty = "";
        $this->purchases_limits = '';
        $this->stock = '';
        $this->expire = '';
        $this->discount = '';
        $this->Id = '';
        $this->tags = [];
    }

    public function create()
    {
        $data = $this->validate();
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/products/' . $imagename);
        }
        $product = ModelProduct::create([
            'ar' => [
                'name' => $data['name_ar'],
                'description' => $data['description_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
                'description' => $data['description_en'],
            ],
            'admin_id' => auth('admin')->id(),
            'price' => $data['price'],
            'image' => isset($imagename) ? $imagename : NULL,
            'product_category_id' => $data['product_category_id'],
            'product_sub_category_id' => $data['product_sub_category_id'],
            'product_sub_sub_category_id' => $data['product_sub_sub_category_id'],
            'qty' => $data['qty'],
            'status' => 'waiting',
            'active' => 1,
        ]);
        $product->tags()->attach($data['tags']);

        $this->resetForm();
        $this->render();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->showEditModal = TRUE;
        $this->Id = $id;
        $item = ModelProduct::findOrFail($this->Id);
        $this->name_ar = $item->{'name:ar'};
        $this->name_en = $item->{'name:en'};
        $this->description_ar = $item->{'description:ar'};
        $this->description_en = $item->{'description:en'};
        $this->price = $item->price;
        $this->status = $item->status;
        $this->qty = $item->qty;
        $this->product_category_id = $item->product_category_id;
        $this->product_sub_category_id = $item->product_sub_category_id;
        $this->product_sub_sub_category_id = $item->product_sub_sub_category_id;
        $this->tags = $item->tags->pluck('id')->toArray();
        $productCampaign = ProductCampaign::whereProductId($this->Id)->where('status', 'active')->first();
        if ($productCampaign != NULL) {
            $this->purchases_limits = $productCampaign->purchases_limits;
            $this->stock = $productCampaign->stock;
            $this->expire = date('Y-m-d', strtotime($productCampaign->expire));
            $this->discount = $productCampaign->discount;
        }

    }

    public function update()
    {
        $data = $this->validate();

        $item = ModelProduct::findOrFail($this->Id);
        $oldimage = $item->image;
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/products/' . $imagename);
        }
        $item->update([
            'ar' => [
                'name' => $data['name_ar'],
                'description' => $data['description_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
                'description' => $data['description_en'],
            ],
            'price' => $data['price'],
            'image' => $imagename ?? $oldimage,
            'product_category_id' => $data['product_category_id'],
            'product_sub_category_id' => $data['product_sub_category_id'],
            'product_sub_sub_category_id' => $data['product_sub_sub_category_id'],
            'status' => $data['status'],
            'qty' => $data['qty'],
        ]);

        $item->tags()->sync($data['tags']);

        if ($data['purchases_limits'] != NULL) {
            $productCampaign = ProductCampaign::whereProductId($item->id)->where('status', 'active')->first();
            if ($productCampaign == NULL) {
                ProductCampaign::create([
                    'product_id' => $item->id,
                    'purchases_limits' => $data['purchases_limits'],
                    'stock' => $data['stock'],
                    'expire' => $data['expire'],
                    'discount' => $data['discount'],
                    'status' => 'active',
                ]);
            } else {
                $productCampaign->update([
                    'product_id' => $productCampaign->product_id,
                    'purchases_limits' => $data['purchases_limits'],
                    'stock' => $data['stock'],
                    'expire' => $data['expire'],
                    'discount' => $data['discount'],
                    'status' => 'active',
                ]);
            }
        }

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
        ModelProduct::destroy($this->Id);
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

    public function active($id)
    {
        $product = ModelProduct::find($id);
        $product->active = 1;
        $product->save();
    }

    public function inactive($id)
    {
        $product = ModelProduct::find($id);
        $product->active = 0;
        $product->save();
    }

    public function render()
    {
        $product_categories = ProductCategory::listsTranslations('name')->pluck('name', 'id')->toArray();

        $modelTags = Tag::where('active', 1)->listsTranslations('name')->pluck('name', 'id')->toArray();

        $product_sub_categories = [];
        if ($this->product_category_id || $this->product_sub_category_id) {
            $product_sub_categories = ProductSubCategory::where(
                'product_category_id',
                $this->product_category_id
            )->listsTranslations('name')->pluck('name', 'id')->toArray();
        }
        $product_sub_sub_categories = [];
        if ($this->product_sub_category_id || $this->product_sub_sub_category_id) {
            $product_sub_sub_categories = ProductSubSubCategory::where(
                'product_sub_category_id',
                $this->product_sub_category_id
            )->listsTranslations('name')->pluck('name', 'id')->toArray();
        }

        $items = ModelProduct::whereTranslationLike('name', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->translatedIn($this->lang)->orderByTranslation(
                    $this->sortField,
                    $this->sortAsc ? 'asc' : 'desc'
                );
            })
            ->paginate(50);
        return view('livewire.admin.product.product', [
            'items' => $items,
            'product_categories' => $product_categories,
            'product_sub_categories' => $product_sub_categories,
            'product_sub_sub_categories' => $product_sub_sub_categories,
            'modelTags' => $modelTags,

        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
