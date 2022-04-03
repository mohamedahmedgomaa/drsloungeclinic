<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Subscribe as ModelSubscribe;

class Subscribe extends Component
{
    public $email = '';

    private function resetForm()
    {
        $this->resetValidation();
        $this->email = "";
    }


    protected function messages()
    {

        if (app()->getLocale() == 'ar') {
            return [
                'email.required' => 'مطلوب حقل البريد الالكتروني.',
                'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
            ];
        } else {
            return [
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
            ];
        }

    }

    protected function rules()
    {
        return [
            'email' => 'required|email|unique:subscribes,email',
        ];
    }

    public function subscribe()
    {
        $data = $this->validate();

        $user = ModelSubscribe::create([
            'email' => $data['email'],
            'subscribe_status' => 'active',
            'user_subscribe' => 'guest',
        ]);

        $this->resetForm();
        $this->render();

        session()->flash('message', 'Subscribe successfully added.');
    }

    public function render()
    {
        return view('livewire.user.subscribe');
    }
}
