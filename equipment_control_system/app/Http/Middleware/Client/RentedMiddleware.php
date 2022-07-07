<?php

namespace App\Http\Middleware\Client;

use Closure;
use Illuminate\Http\Request;

class RentedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $this->checkMethod($request->method(), $request);

        return $next($request);
    }

    public function checkMethod($method, $request)
    {
        if ($method == 'POST')
            return $this->treatRequestPost($request);
        
        if ($method == 'PUT' || $method == 'PATH')
            return $this->treatRequestPut($request);
        
        if ($method == "DELETE")
            return $this->treatRequestDelete($request);

        return;
    }

    public function treatRequestPost($request)
    {

    }

    public function treatRequestPut($request)
    {

    }

    public function treatRequestDelete($request)
    {

    }


}
