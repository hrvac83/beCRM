<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use Session;

class CompanyController extends Controller
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
       if (\Auth::user()->company_id == NULL)
        {
            return redirect()->route('company.create');
        }

        $company= Company::find(\Auth::user()->company_id);

        return view('company/index')->with('company',$company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->company_id != NULL)
        {
            return redirect()->route('company.index');
        }

        return view('company/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data

        //Save data
        $company = new Company;
        $company->name=$request->name;
        $company->address=$request->address;
        $company->oib=$request->oib;
        $company->email='';
        $company->phone='';
        $company->save();

        $company = Company::where('oib', $request->oib)->get();
        $user = User::where('id', \Auth::user()->id);
        $user->update(['company_id' => $company[0]->id]);
        
        //Flash success
        $request->session()->flash('success', 'Tvrtka '.$request->name.' je uspješno prijavljena');

        //Redirect
        return redirect()->route('company.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company= Company::find($id);
        $uri = url('dashboard/company/'.$id);

        return view('company/edit')->with('company', $company)->with('uri', $uri);
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

        //Validate data

        //Update
        $company = Company::find($id);
        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'oib' => $request->oib
        ]);

        //Flash success
        $request->session()->flash('success', 'Tvrtka '.$request->name.' je uspješno uređena');

        //Redirect
        return redirect()->route('company.index');
    }


}
