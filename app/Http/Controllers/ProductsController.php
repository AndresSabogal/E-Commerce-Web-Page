<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $categories = ProductCategory::where('id', $request->category)->first();
        }

        $categories = ProductCategory::all();

        return view('products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the product fields
        $request->validate([
            'product_name' => 'required|max:255',
            'product_slug' => 'required|max:255',
            'product_category'=>'required'
        ]);

        $product = new Product;

        $product->name = $request->product_name;
        $product->slug = $request->product_slug;
        $product->description = $request->product_description;
        $product->page_title = $request->product_page_title;
        $product->image = $request->product_image;
        $product->status = $request->product_status;
        $product->category_id=$request->product_category;
        $product-> save();


            if($request->product_category != null){
                $product->categories()->attach($request->product_category);
                $product->save();
            }

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('products.edit', [
            'product'=>$product,
            'name'=>$product->name,
            'slug'=>$product->slug,
            'description'=>$product->description,
            'page_title'=>$product->page_title,
            'status'=>$product->status,
            'image'=>$product->image
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        //validate the fields
        $request->validate([
            'product_name' => 'required|max:255',
            'product_slug' => 'required|max:255',

        ]);

        $product->name = $request->product_name;
        $product->slug = $request->product_slug;
        $product->description = $request->product_description;
        $product->status = $request->product_status;
        $product->page_title = $request->product_page_title;
        $product->image = $request->product_image;
        $product->save();

        // $user->roles()->detach();
        // $user->permissions()->detach();

        // if($request->role != null){
        //     $user->roles()->attach($request->role);
        //     $user->save();
        // }


        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $product->roles()->detach();
        // $user->permissions()->detach();
        $product->delete();

        return redirect('/products');
    }
}
