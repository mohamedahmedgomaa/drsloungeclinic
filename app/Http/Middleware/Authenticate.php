<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Authenticate extends Middleware {
    /**
     * @var array
     */
    protected $guards = [];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string[] ...$guards
     *
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function handle( $request, Closure $next, ...$guards ) {
        $this->guards = $guards;

        return parent::handle( $request, $next, ...$guards );
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     *
     * @return string
     */
    protected function redirectTo( $request ) {
        if ( ! $request->expectsJson() ) {
            $guard = Arr::first( $this->guards );
            switch ( $guard ) {

                case 'web':
                    return route( 'user.login' );
                    break;

                case 'admin':
                    return route( 'admin.login' );
                    break;
            }
        }

        return route( 'customer.login' );
    }
}
