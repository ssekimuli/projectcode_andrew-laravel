<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Companies::paginate(10);
       return view('companies', compact('company'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Company_Name'=>'required',
            'email'=>'required',
            'website'=>'required',
            'CompanyLogo'=>'required',
        ]);

        $Company_Name=$request->input('Company_Name');
        $email=$request->input('email');
        $website=$request->input('website');
       // $CompanyLogo=$request->hasFile('CompanyLogo');
        //dd($CompanyLogo);

      if ($request->hasFile('CompanyLogo')) {
       $orig_roomimage = $request->CompanyLogo->getClientOriginalName();
       $request->CompanyLogo->storeAs('/public/CompaniesLogo/', $orig_roomimage);

        $Companies=Companies::create([
            'name'=>$Company_Name,
            'email'=>$email,
            'website'=>$website,
            'logo'=>$orig_roomimage,
        ]);
    }
    return back()->with('msg', 'Company added successfully');
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
       $request->validate([
            'Company_Name'=>'required',
            'email'=>'required',
            'website'=>'required',
        ]);
        $cpy=Companies::find($id);
        $cpy->name=$request->input('Company_Name');
        $cpy->email=$request->input('email');
        $cpy->website=$request->input('website');
        $cpy->save();

        return back()->with('msg', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp=Companies::find($id);
        $comp->delete();

        return back()->with('delete', 'Company deleted successfully');
    }
}
