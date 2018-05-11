<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceItem;
use App\Item;

class InvoiceController extends Controller
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
        //temporary - until invoice/create is finished
        return redirect()->route('invoice.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::where('company_id', \Auth::user()->company_id)->get();
        return view ('invoice/create')->with('items', $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request->buyer_address;

        $invoice = new Invoice;
        $invoice->company_id = \Auth::user()->company_id;
        $invoice->user_id = \Auth::user()->id;
        $invoice->invoice_num = $request->invoice_num;
        $invoice->buyer_name = $request->buyer_name;
        $invoice->buyer_address = $request->buyer_address;
        $invoice->buyer_oib = $request->buyer_oib;
        $invoice->seller_name = $request->seller_name;
        $invoice->seller_address = $request->seller_address;
        $invoice->seller_oib = $request->seller_oib;
        $invoice->payment_option = $request->payment_option;
        $date = \DateTime::createFromFormat('d/m/Y', $request->invoice_date)->format('Y-m-d');
        $invoice->invoice_date = $date;
        if ($request->additional_option==null){
            $invoice->additional_option="";
        }
        else{
            $invoice->additional_option = $request->additional_option;
        };

        $invoice->save();
        $invoice = Invoice::where('company_id', \Auth::user()->company_id)->where('invoice_num', $request->invoice_num)->get();
        return $invoice[0]->id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
