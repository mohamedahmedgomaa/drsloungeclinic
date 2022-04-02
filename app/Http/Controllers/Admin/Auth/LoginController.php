<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware( 'guest:admin', [ 'except' => [ 'logout' ] ] );
    }

    public function login()
    {
        return view('admins.components.auth.login');
    }

    public function logout()
    {
        Auth::guard( 'admin' )->logout();

        return redirect()
            ->route( 'admin.login' )
            ->with( 'message', 'Logged out successfully!' );

    }
}
