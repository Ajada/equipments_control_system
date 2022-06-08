<?php

namespace App\Http\Middleware\Application;

use App\Http\Controllers\Application\HomeController;
use App\Models\Application\HomeModel;
use Closure;
use Illuminate\Http\Request;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next  )
    {
        $this->checkMethod($request->method(), $request);

        return $next($request);
    }

    /**
     * @param Illuminate\Http\Request $request
     * @param string $method
     */
    public function checkMethod($method, $request)
    {
        if($method == 'POST')
            return $this->checkRequestPost($request);

        if($method == 'PUT' || $method == 'PATCH')
            return $this->checkRequestPut($request);
        
        if($method == "DELETE")
            return $this->checkRequestDelete($request);
        
        return;
    }

    /**
     * @param string $code
     */
    public function checkEquipmentExists($code)
    {
        $home = HomeModel::whereIdentifierCode($code)->first();

        !$home ? die(json_encode(['error' => 'equipment does not exists'])) : '';

        return $home;
    }

    /**
     * Verifica se os campos estão preenchidos
     * 
     * @param Illuminate\Http\Request
     * @return $request
     */
    public function checkRequestPost($request)
    {
        !$request->filled('name') || 
            !$request->filled('identifier_code') || 
                !$request->filled('owner') ? die(json_encode(['error' => 'mandatory parameters undefined'])) : '';
     
        $this->checkEquipmentExists($request->identifier_code);
                
        return $request;
    }

    /**
     * Verifica se o equipemanto existe para ser atualizado 
     * 
     * @param Illuminate\Http\Request
     * @return $request
     */
    public function checkRequestPut($request)
    {
        $this->checkEquipmentExists($request->identifier_code);        

        return $request;
    }

    /**
     * @param Illuminate\Http\Request
     */
    public function checkRequestDelete($request)
    {
        $this->checkEquipmentExists($request->identifier_code);

        return $request;
    }

}

