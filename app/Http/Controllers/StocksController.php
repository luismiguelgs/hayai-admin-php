<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    public function index()
    {
        $items = DB::table('stocks')->join('productos','stocks.producto_id','=','productos.id')->
            select('stocks.*','productos.nombre')->get();
        return response($items);
    }
    public function store(Request $request)
    {
        try{
            $id = Stock::create($request->all())->id;
            return response()->json(['status'=>true,'id'=>$id],200);
        }
        catch(\Exception $e){
            return response($e,500);
        }
    }
    public function show($id)
    {
        try{
            $item = Stock::find($id);

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
            Stock::where("id",$id)->update($request->all());
            $item = Stock::find($id);
            return response($item);
        }
        catch(\Exception $e){
            return response('Something bad',500);
        }
    }
    public function destroy($id)
    {
        try{
            $item = Stock::find($id);

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
