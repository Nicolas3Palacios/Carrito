<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(6);
        $categories = Category::all();

        return view('product', compact('products', 'categories'));
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
        $product = $request->all();
        $imageName = null;

        if ($request->hasFile('image_name')) {
            
            $imageName = "images/products/{$request->image_name->getClientOriginalName()}.{$request->image_name->getClientOriginalExtension()}";
            $request->image_name->move(public_path('images/products'),$imageName);

        }
        
        Product::create($product);

        return response()->json([
            'saved' => true,
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::all();
        $categories = Category::all();


        return view('pages.items', compact('products', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = Product::where('id',$product)->first();
        $categories = Category::all();
        return view('pages.product_edit',['product_id' => $product,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {

        if ($request->hasFile('image_name')) {

            $product['image_name'] = $request->file('image_name')->store('uploads','public');

        }

        $product->update($request->all());


        $products=Product::all();
        return response()->json([
            'updated' => true,
            'products' => $products
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($product)
    {
        $product = Product::find($product);
        $product->delete();
        return response()->json([
            'deleted' => true,
        ]);
    }

    /**
     *
     */
    public function cerrar()
    {
        Auth::logout();
        $products = Product::all();
        $categories = Category::all();

        return view('product', compact('products', 'categories'));
    }
}
