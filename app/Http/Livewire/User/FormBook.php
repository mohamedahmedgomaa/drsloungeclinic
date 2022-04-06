<?php

namespace App\Http\Livewire\User;

use App\Models\UserBook;
use Livewire\Component;

class FormBook extends Component
{

    public $name = '';
    public $phone = '';
    public $email = '';
    public $service = '';

    private function resetForm()
    {
        $this->resetValidation();
        $this->email = "";
        $this->phone = "";
        $this->name = "";
        $this->service = "";
    }


    protected function messages()
    {

        if (app()->getLocale() == 'ar') {
            return [
                'name.required' => 'مطلوب حقل الاسم الأول.',
                'phone.required' => 'مطلوب حقل الاسم الثاني.',
                'email.required' => 'مطلوب حقل البريد الالكتروني.',
                'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
                'service.required' => 'مطلوب حقل البريد الالكتروني.',
            ];
        } else {
            return [
                'name.required' => 'The firstname field is required.',
                'phone.required' => 'The phone field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'service.required' => 'The service field is required.',
            ];
        }

    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'service' => 'required',
        ];
    }

    public function registration()
    {
        $data = $this->validate();

        $user = UserBook::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $data['service'],
            'status' => 'wanting',
        ]);

        $this->resetForm();
        $this->render();

        session()->flash('message', trans('users.bookingSuccessfullyAdded'));
    }


    public function render()
    {
        return view('livewire.user.form-book');
    }
}
