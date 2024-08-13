<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Company;
use App\Models\admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts()
    {
        $prods=Company::with("productsOwner")->get();
        return $prods;
    }
    public function index()
    {
        $coms=Company::all();
        return view("admin.product.addProduct",compact("coms"));
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
//        return $request;

//
//            $data=[
//                "name"=>$request->name,
//                "size"=>ucfirst($request->size),
//                "country"=>$request->country,
//                "city"=>$request->city
//            ];
      $comp_id=Company::where("name",$request->company)->get()->first()->id;
//      return $comp_id;
//
//        $date=Date::createFromFormat("")
//        return $request->date;
            Product::firstOrCreate([
                "name"=>$request->name,
                "company_id"=>$comp_id,
                "details"=>$request->details,
                "exp_date"=>$request->exp_date,
            ]);
            $allProds= $this->getAllProducts();
            return view("admin.product.showProduct",compact("allProds"));
//        return $allProds;
//
   }
    public function getProduct(Request $request)
    {
//return $request;
        $prod=Product::find($request->id);
        $data=[
            "id"=>$prod->id,
            "name"=>$prod->name,
            "exp_date"=>$prod->exp_date,
            "company_id"=>$prod->company,
            "details"=>$prod->details
        ];
        return view("admin.product.updateProduct",compact("data"));
    }
    public function delProduct(Request $request)
    {
        $p=Product::find($request->id);

        $p->delete();
        return redirect()->route('product_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $allProds= $this->getAllProducts();
        return view("admin.product.showProduct",compact("allProds"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function updateProduct( Request $request)
    {
//        return $request;
        $name=$request->name;
        $WithName=Product::with("haveOwner")->where('name',$name)->count();
//return $WithName;

        if($WithName+1>1){
            return redirect()->back()->with("Error","There is Product with this name already");
        }

        Product::where("id",$request->id)->update([
            "name"=>$request->name,
            "exp_date"=>$request->exp_date,
            "details"=>$request->details
        ]);
        return redirect()->back()->with("Success","Product is updated successfully");
    }
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
