<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('welcome');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
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
    public function store(ProductRequest $request)
    {
        if ($request->ajax()) {
            $product = new Product();
            $product->name = $request->name;
            $product->quantity = $this->clean_numbers($request->quantity);
            $product->price = $this->clean_numbers($request->price)*100; //save price in penies
            $product->save();
            return response()->json([
                  'product' => $product,
                  'message' => 'Success'
              ], 200);
        } else {
            return response()->json([
                  'message' => 'Invalid Request'
              ], 200);
        }
        
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
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        } else {
            return view('products.edit', compact('product'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        if ($request->ajax()) {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->quantity = $this->clean_numbers($request->quantity);
            $product->price = $this->clean_numbers($request->price)*100; //save price in penies
            $product->save();
            return response()->json([
                  'product' => $product,
                  'message' => 'Success'
              ], 200);
        } else {
            return response()->json([
                  'message' => 'Invalid Request'
              ], 200);
        }
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
