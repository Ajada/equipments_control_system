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
    public function checkEquipmentExists($id)
    {
        $home = HomeModel::whereId($id)->first();

        !$home ? die(json_encode(['error' => 'equipment does not exists'])) : '';

        return $home;
    }

    /**
     * @param string $code
     */
    public function checkIdentifier($code)
    {
        $identifier = HomeModel::whereIdentifierCode($code)->first();

        $identifier ? die(json_encode(['error' => 'this tag already exists'])) : '';

        return $identifier;
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
     
        $this->checkEquipmentExists($request->id);

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
        $this->checkEquipmentExists($request->id);        

        $request->filled('identifier_code') ? $this->checkIdentifier($request->identifier_code) : '';

        return $request;
    }

    /**
     * @param Illuminate\Http\Request
     */
    public function checkRequestDelete($request)
    {
        $this->checkEquipmentExists($request->id);

        return $request;
    }

}

