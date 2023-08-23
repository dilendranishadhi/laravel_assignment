<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $company = Company::latest()->paginate(10);
    
            return view('companies.index',compact('company'))
                ->with(request()->input('page'));
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required',
                
            ]);
        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->webiste = $request->input('webiste');


          
                $file = $request->file('logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/company/', $filename);
                $company->logo = $filename;
        
            $company->save();
            return redirect()->route('company.index')
                            ->with('success','Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        {
            return view('companies.show',compact('product'));
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $company =Company::find($id);
            return view('companies.edit',compact('company'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company =Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->webiste = $request->input('webiste');


          if($request->hasfile('logo')){
            $destination = 'uploads/company/'.$company->logo;
            if(File::exists($destination)){
                File::delete($destination);
            }
                $file = $request->file('logo');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('uploads/company/', $filename);
                $company->logo = $filename;
        

          }
          $company->update();
          return redirect()->route('company.index')
                          ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        {
            $company->delete();
    
            return redirect()->route('company.index')
                            ->with('success','company deleted successfully');
        }
    }
}
