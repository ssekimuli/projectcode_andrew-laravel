<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Employe=Employees::paginate(10);
        $company=Companies::all();

        //dd($Employe);
       return view('employees', compact(['company','Employe']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'fname'=>'required',
            'lname'=>'required',
            'company'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $company=$request->input('company');
        $phone=$request->input('phone');
        $email=$request->input('email');

        $Employees=Employees::create([
            'firstname'=>$fname,
            'lastname'=>$lname,
            'company_id'=>$company,
            'email'=>$phone,
            'phone'=>$email,
        ]);

         return back()->with('msg', 'Employee addd successfully');
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
            'fname'=>'required',
            'lname'=>'required',
            'company'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $Employee=Employees::find($id);
        $Employee->firstname=$request->input('fname');
        $Employee->lastname=$request->input('lname');
        $Employee->company_id=$request->input('company');
        $Employee->email=$request->input('email');
        $Employee->phone=$request->input('phone');
        $Employee->save();

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
        $comp=Employees::find($id);
        $comp->delete();

        return back()->with('delete', 'Employee deleted successfully');
    }
}
