<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.company.addCompany");
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
    public function getAllCompanies(){
        return Company::all();
    }
    public function delCompany(Request $request)
    {
        $c=Company::find($request->id);
        $c->delete();
        return redirect()->route('company_show');
    }
public function getCompany(Request $request)
{

        $comp=Company::find($request->id);
        $data=[
            "id"=>$comp->id,
            "name"=>$comp->name,
            "size"=>ucfirst($comp->size),
            "country"=>$comp->country,
            "city"=>$comp->city
        ];
        return view("admin.company.updateCompany",compact("data"));
}
public function updateCompanyGet()
{
//    return view("admin.company.updateCompany");
}

public function updateCompany(Request $request)
{
    $name=$request->name;
    $WithName=Company::where('name',$name)->count();

    if($WithName+1>1){
        return redirect()->back()->with("Error","There is Company with this name already");
    }

    Company::where("id",$request->id)->update([
        "name"=>$name,
        "size"=>$request->size,
        "country"=>$request->country,
        "city"=>$request->city
    ]);
    return redirect()->back()->with("Success","Company is updated successfully");

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $name=$request->name;
        $WithName=Company::where('name',$name)->count();

        if($WithName==0){
        $data=[
            "name"=>$request->name,
            "size"=>ucfirst($request->size),
            "country"=>$request->country,
            "city"=>$request->city
            ];


            Company::firstOrCreate([
                "name"=>$name,
                "size"=>$request->size,
                "country"=>$request->country,
                "city"=>$request->city
            ]);
        $allComps= $this->getAllCompanies();
        return view("admin.company.showCompany",compact("allComps"));
        }
        else{
            return back()->with('error', 'Company already exists!');
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
        $allComps= $this->getAllCompanies();
        return view("admin.company.showCompany",compact("allComps"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
