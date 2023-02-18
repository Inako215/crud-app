<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faker = \Faker\Factory::create();

       $request->validate([
            'name' => 'required',
            'price' => 'regex:/^\d+(\.\d{1,2})?$/|required',
            'item_number' => 'integer|required',
            'description' => 'required',
        ]);

        \App\Models\Product::create([
            'name' => $request->name,
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'price' => $request->price,
            'description' => $request->description,
            'item_number' => $request->item_number
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
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
        $faker = \Faker\Factory::create();

        $request->validate([
             'name' => 'required',
             'price' => 'regex:/^\d+(\.\d{1,2})?$/|required',
             'item_number' => 'integer|required',
             'description' => 'required',
         ]);
 
         Product::find($id) -> update([
             'name' => $request->name,
             'image' => $faker->imageUrl($width = 640, $height = 480),
             'price' => $request->price,
             'description' => $request->description,
             'item_number' => $request->item_number
         ]);
 
         return redirect()->route('products.index')->with('success', 'Product Has Been Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
