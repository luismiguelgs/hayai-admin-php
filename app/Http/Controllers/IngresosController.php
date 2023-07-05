<?php

namespace App\Http\Controllers;

use App\Ingreso;
use Illuminate\Http\Request;

class IngresosController extends Controller
{
    public function index()
    {
        $input = $request->all();
        if($request->get('periodo')){
            $items = DB::table('ingresos')->join('operaciones','ingresos.operacion_id','=','operaciones.id')->
            select('ingresos.*','operaciones.nombre')->where('periodo',$request->get('periodo'))->get();
        }
        $items = DB::table('ingresos')->join('operaciones','ingresos.operacion_id','=','operaciones.id')->
            select('ingresos.*','operaciones.nombre')->get();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Ingreso::create($request->all())->id;
            return response()->json(['id'=>$id,'Item Save'],200);
        }
        catch(\Exception $e){
            return response('Something bad '.$e,500);
        }
    }
    public function show($id)
    {
        try{
            $item = Ingreso::find($id);

            if(!$item){
                return response()->json(['Item no existe'],404);
            }
            return response()->json($item,200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function update(Request $request, $id)
    {
        try{
            Ingreso::where("id",$id)->update($request->all());
            $item = Ingreso::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Ingreso::find($id);

            if(!$item){
                return response()->json(['Item no existe'],404);
            }
            $item->delete();
            return response()->json('Item borrado',200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
}
