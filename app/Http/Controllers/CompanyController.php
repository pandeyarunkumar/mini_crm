<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' => 'required|string',
        ]);

        $company = new Company();

        $logo = $request->file('logo');

        if($logo){

            $logo = $this->saveLogo($logo);

            if(!$logo){
                return redirect()->back()->withErrors(['image size must be greater than or equal to 100X100']);
            }

            $company->logo = $logo;

        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();
        
        return redirect()->route('get-companies');
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
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
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
            'name' => 'required|string',
        ]);

        $company = Company::findOrFail($id);

        $logo = $request->file('logo');

        if($logo){

            $logo = $this->saveLogo($logo);

            if(!$logo){
                return redirect()->back()->withErrors(['image size must be greater than or equal to 100X100']);
            }

            $company->logo = $logo;
        }
        
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website; 
        $company->save();

        return redirect()->route('get-companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return redirect()->route('get-companies');
    }
}
