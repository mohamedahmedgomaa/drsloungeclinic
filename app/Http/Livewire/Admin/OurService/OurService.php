<?php

namespace App\Http\Livewire\Admin\OurService;

use App\Models\OurService as ModelOurService;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OurService extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name_ar;
    public $name_en;
    public $description_ar;
    public $description_en;
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
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
                'image' => 'required|image',
            ];
        } else {
            $rules = [
                'name_ar' => 'required',
                'name_en' => 'required',
                'description_ar' => 'required',
                'description_en' => 'required',
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
    }

    public function create()
    {
        $data = $this->validate();
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/productCategories/' . $imagename);
        }
        ModelOurService::create([
            'ar' => [
                'name' => $data['name_ar'],
                'description' => $data['description_ar'],
            ],
            'en' => [
                'name' => $data['name_en'],
                'description' => $data['description_en'],
            ],
            'image' => isset($imagename) ? $imagename : NULL,
            'active' => 1,
        ]);
        $this->resetForm();
        $this->render();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $this->showEditModal = TRUE;
        $this->Id = $id;
        $item = ModelOurService::find($this->Id);
        $this->name_ar = $item->{'name:ar'};
        $this->name_en = $item->{'name:en'};
        $this->description_ar = $item->{'description:ar'};
        $this->description_en = $item->{'description:en'};
    }

    public function update()
    {
        $data = $this->validate();
        $item = ModelOurService::findOrFail($this->Id);
        $oldimage = $item->image;
        if ($this->image) {
            $imagename = time() . '.' . $this->image->extension();
            Image::make($this->image)->save('images/productCategories/' . $imagename);
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
        ModelOurService::destroy($this->Id);
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
        $items = ModelOurService::whereTranslationLike('name', '%' . $this->search . '%')
            ->when($this->sortField, function ($query) {
                $query->translatedIn($this->lang)->orderByTranslation(
                    $this->sortField,
                    $this->sortAsc ? 'asc' : 'desc'
                );
            })
            ->paginate(10);

        return view('livewire.admin.our-service.our-service', [
            'items' => $items,
        ])
            ->extends('admins.layout.index')
            ->section('content');
    }
}
