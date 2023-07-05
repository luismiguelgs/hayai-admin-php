<?php

namespace App\Http\Controllers;

use App\Operacion;
use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    public function index()
    {
        $items = Operacion::all();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Operacion::create($request->all())->id;
            return response()->json(['status'=>true,'id'=>$id],200);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function show($id)
    {
        try{
            $item = Operacion::find($id);

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
            Operacion::where("id",$id)->update($request->all());
            $item = Operacion::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Operacion::find($id);

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
