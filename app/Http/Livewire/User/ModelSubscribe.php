<?php

namespace App\Http\Livewire\User;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ModelSubscribe extends Component
{
    public $email = '';
    public $subscribe_not_show = false;

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

        $user = \App\Models\Subscribe::create([
            'email' => $data['email'],
            'subscribe_status' => 'active',
            'user_subscribe' => 'guest',
        ]);

        $this->resetForm();
        $this->render();

        session()->flash('message', 'Subscribe successfully added.');
    }

    public function subscribe_not_show(Request $request)
    {
        $request->session()->put('subscribe_not_show', 'not_show');
        session()->flash('message', 'Subscribe successfully added.');
    }

    public function render()
    {
        if ($this->subscribe_not_show == 'not_show') {
            request()->session()->put('subscribe_not_show', 'not_show');
            session()->flash('message', 'Subscribe successfully added.');
        }

        return view('livewire.user.model-subscribe');
    }
}
