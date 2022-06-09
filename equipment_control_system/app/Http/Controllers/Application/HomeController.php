<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe lista de recurso
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(HomeModel::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     * Armazene um recurso recém-criado no armazenamento.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        HomeModel::create($request->all());

        return response()->json(['success' => 'new equipment added to inventory']);
    }

    /**
     * Display the specified resource.
     * Exiba o recurso especificado.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = HomeModel::whereId($id)->first();

        return response()->json(['equipment' => $equipment]);
    }

    /**
     * Update the specified resource in storage.
     * Atualize o recurso especificado no armazenamento.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->filled('name') ? 
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'name' => $request->name
                    ]) : '';

        $request->filled('image') ? 
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'image' => $request->image //make function separate
                    ]) : '';

        $request->filled('identifier_code') ? // conflito
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'identifier_code' => $request->identifier_code
                    ]) : '';

        $request->filled('type_maintenance') ? 
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'type_maintenance' => $request->type_maintenance
                    ]) : '';

        $request->filled('owner') ? 
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'owner' => $request->owner
                    ]) : '';

        $request->filled('name') ? 
            DB::table('inventory')
                ->whereId($id)
                    ->update([
                        'observation' => $request->observation
                    ]) : '';
                
        return response()->json(['success' => 'equipment has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     * Remova o recurso especificado do armazenamento.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('inventory')->whereId($id)->delete();

        return response()->json(['success' => 'equipment deleted successfully']);
    }
}
