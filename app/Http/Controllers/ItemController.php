<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;

class ItemController extends Controller
{
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
        $items= Item::where('company_id',1)->get();

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
            'code' => 'unique:items,item_code,NULL,id,company_id,1|max:15', //last argument in unique clause should be companyId from session
            'description' => 'max:191',
            'module' => 'max:10',
            'price' => 'numeric'
        ));

        //store in database
        $item = new Item;

        $item->company_id = 1;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'item_code' => 'unique:items,item_code,NULL,id,company_id,1|max:15', //last argument in unique clause should be companyId from session
            'description' => 'max:191',
            'module' => 'max:10',
            'price' => 'numeric'
        ));

        //save data (update) to database

        //no request properties set -- maybe form cant take values from dynamically generated inputs

        $item= Item::where('item_code',$id)->where('company_id',1)->get();
        $item->item_code = $request->item_code;
        $item->description = $request->description;
        $item->module = $request->module;
        $item->price = $request->price;
        //Item::where('item_code',$id)->where('company_id',1)->update(....);->ovu metodu koristit,
        //$item->save();
        

        //flash data
        Session::flash('success', 'Stavka je uspješno spremljena');

        //redirect
        return redirect()->route('items.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Item::where('item_code',$id)->where('company_id',1)->delete();
        Session::flash('success', 'Stavka sa šifrom '.$id.' je uspješno obrisana');
        
        return redirect()->route('items.create');

    }
}
