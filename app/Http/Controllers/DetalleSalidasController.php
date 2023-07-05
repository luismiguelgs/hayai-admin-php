<?php

namespace App\Http\Controllers;

use App\DetalleSalida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleSalidasController extends Controller
{
    public function index($salida)
    {
        $items = DB::table('detalle_salidas')->join('productos','detalle_salidas.producto_id','=','productos.id')->
            select('detalle_salidas.*','productos.nombre')->where('salida_id',$salida)->get();
        return \response($items);
        
    }
    public function store(Request $request)
    {
        try{
            $data = \json_decode($request->getContent(),true);
            foreach($data as &$d)
            {
                $d['created_at'] = new \Datetime();
                $d['updated_at'] = $d['created_at'];
            }
            DetalleSalida::insert($data);
            return response()->json(['status'=>true,'msg'=>'Item Save'],200);
        }
        catch(\Exception $e){
            return response($e,500);
        }
    }
    public function show($id)
    {
        try{
            $item = DetalleSalida::find($id);

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
            DetalleSalida::where("id",$id)->update($request->all());
            $item = DetalleSalida::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = DetalleSalida::find($id);

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
