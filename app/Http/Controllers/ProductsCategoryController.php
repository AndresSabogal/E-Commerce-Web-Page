<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::orderBy('id', 'desc')->get();

        return view('productsCategory.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsCategory.create');
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
                    'category_name' => 'required|max:255',
                    'category_slug' => 'required|max:255',
                    'category_description'=>'required',
                    'category_image'=>'required'
                ]);

                $category = new ProductCategory();

                $category->name = $request->category_name;
                $category->slug = $request->category_slug;
                $category->description = $request->category_description;
                $category->page_title = $request->category_page_title;
                $category->meta_description = $request->category_meta_description;
                $category->image = $request->category_image;
                $category-> save();


                return redirect('/productsCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $category)
    {
        return view('productsCategory.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        return view('productsCategory.edit', [
            'category'=>$category,
            'name'=>$category->name,
            'slug'=>$category->slug,
            'description'=>$category->description,
            'page_title'=>$category->page_title,
            'image'=>$category->image
            ]);
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
