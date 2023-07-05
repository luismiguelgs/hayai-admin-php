<?php

namespace App\Http\Controllers;

use App\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidasController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('periodo')){
            $items = DB::table('salidas')->join('operaciones','salidas.operacion_id','=','operaciones.id')->
            select('salidas.*','operaciones.nombre')->where('periodo',$request->get('periodo'))->get();
        }
        else{
            $items = DB::table('salidas')->join('operaciones','salidas.operacion_id','=','operaciones.id')->
            select('salidas.*','operaciones.nombre')->get();
        }
        
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Salida::create($request->all())->id;
            return response()->json(['id'=>$id,'Item Save'],200);
        }
        catch(\Exception $e){
            return response('Something bad '.$e,500);
        }
    }
    public function show($id)
    {
        try{
            $item = Salida::find($id);

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
            Salida::where("id",$id)->update($request->all());
            $item = Salida::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Salida::find($id);

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
