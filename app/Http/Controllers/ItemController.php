<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return redirect()->route('items.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $items= Item::where('company_id', \Auth::user()->company_id)->orderBy('id', 'desc')->paginate(10);

        return view ('items/create')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data validation
        $this->validate($request, array(
            'code' => 'unique:items,item_code,NULL,id,company_id,'.\Auth::user()->company_id.'|max:15',
            'description' => 'max:191',
            'module' => 'max:10',
            'price' => 'numeric'
        ));

        //store in database
        $item = new Item;

        $item->company_id = \Auth::user()->company_id;
        $item->item_code = $request->code;
        $item->description = $request->description;
        $item->module = $request->module;
        $item->price = $request->price;

        $item->save();

        $request->session()->flash('success', 'Stavka sa šifrom '.$request->code.' je uspješno dodana');
        $request->session()->flash('description', 'Opis: '.$request->description.' J.M.: '.$request->module.' Cijena: '.$request->price);

        //redirect
        return redirect()->route('items.create');
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

        //validate data
        $this->validate($request, array(
            'item_code'=>'unique:items,item_code,'.$id.',id,company_id,'.\Auth::user()->company_id.'|max:15',
            'description' => 'max:191',
            'module' => 'max:10',
            'price' => 'numeric'
        ));

        //save data (update) to database

        Item::where('id',$id)->update(['item_code'=>$request->item_code, 'description'=>$request->description,'module'=>$request->module, 'price'=>$request->price]);

        //flash data
        Session::flash('success', 'Stavka je uspješno uređena');
        Session::flash('description', 'Šifra: '.$request->item_code.' Opis: '.$request->description.' J.M.: '.$request->module.' Cijena: '.$request->price);

        return ('Update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Item::where('item_code',$id)->where('company_id', \Auth::user()->company_id)->delete();
        Session::flash('success', 'Stavka sa šifrom '.$id.' je uspješno obrisana');
        
        return redirect()->route('items.create');

    }
}
