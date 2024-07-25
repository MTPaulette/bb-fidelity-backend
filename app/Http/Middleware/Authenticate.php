<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('home');
        }
    }
    /*
    public function handle($request, Closure $next, ...$guards)
    {
        $user = $request->user();
        if(is_null($user)) {

        return response(['message' => 'unauthorize'], 403);
        }
        $this->authenticate($request, $guards);

        return $next($request);
    }
    /*
    public function handle($request, Closure $next, ...$guards)
    {
        //return $this->authenticate($request, $guards);
        
        if($request->user()) {
            return 'dddddd';
            $jwt = $request->user()->token;
            $request->headers->set('Authorization', 'Bearer '.$jwt);
        }
        $this->authenticate($request, $guards);

        return $next($request);
    }

/*
    public function handle($request, Closure $next, ...$guards)
    {
        return $request->cookie('jwt');
        if($request->cookie('jwt')) {
            $jwt = $request->cookie('jwt');
            $request->headers->set('Authorization', 'Bearer '.$jwt);
        }
        // return $request->cookie('jwt');
        $this->authenticate($request, $guards);

        return $next($request);
    }

/*
    public function handle($request, Closure $next, ...$guards)
    {
        // return $request->headers;
        if($request) {
            return $request;
            $jwt = $request->user()->token;
            $request->headers->set('Authorization', 'Bearer '.$jwt);
        }
        $this->authenticate($request, $guards);

        return $next($request);
    }
*/

}
