<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $password = '';
    public $email = '';
    public $remember = '';

    private function resetForm()
    {
        $this->resetValidation();
        $this->email = "";
        $this->password = "";
        $this->remember = "";
    }


    protected function messages()
    {

        if (app()->getLocale() == 'ar') {
            return [
                'email.required' => 'مطلوب حقل البريد الالكتروني.',
                'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا.',
                'password.required' => 'مطلوب حقل كلمة السر.',
            ];
        } else {
            return [
                'password.required' => 'The password field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
            ];
        }

    }

    protected function rules()
    {
        return [
            'email' => 'required|email|exists:admins',
            'password' => 'required',
        ];
    }

    public function login()
    {

        $data = $this->validate();

        if (Auth::guard('admin')->attempt($data)) {

            session()->flash('message', 'Login Success.');

            return redirect()->route('admin.dashboard');
        }

        session()->flash('message_error', 'Login Not Success.');
    }


    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
