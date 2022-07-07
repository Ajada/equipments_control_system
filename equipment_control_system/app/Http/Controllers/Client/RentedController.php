<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Application\HomeModel;
use App\Models\Client\RentedEquipmentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index');
    }

    /**
     * Cria uma nova locação e define o status como 1
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response * 
     */
    public function store(Request $request)
    {
        dd('store');

        RentedEquipmentModel::create($request->all());

        DB::table('inventory')
            ->whereId($request->id)
                ->update([
                    'status' => 1
                ]);

        return response()->json(['success' => $request->equipment_name.' successfully rented']);
    }

    /**
     * Display the specified resource.
     * Mostra os dados de locação do aparelho selecionado
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');

        $rented_equipment = RentedEquipmentModel::whereId($id)->first();

        return response()->json(['equipment' => $rented_equipment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('update');
        
    }

    /**
     * Remove the specified resource from storage.
     * Libera o equipamento locado e define como status = 0 no inventario
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');

        $rented_equipment = DB::table('rented_equipments')->whereId($id)->delete();

        if(!$rented_equipment)
            return response()->json(['error' => 'something went wrong when deleting the record']);
        
        /**TODO
         * GERAR LOG QUANDO O EQUIPAMENTO FOR DEVOLVOLVIDO - chamar controller de metodo a parte
         */

        return response()->json(['success' => 'equipment leased deleted succesfully']);
    }
}
