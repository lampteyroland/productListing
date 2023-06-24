<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProductController extends Controller

{
    // All products
    public function index()
    {
//        $products = Product::all(); //fetch all products from DB
        return view('products.index', ['products' => Product::latest()
            ->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Get single product
public function show(Product $product){
        return view('products.show', ['product' => $product]);

}

// Show create form
    public function create(Product $product){
        return view('products.create');

    }


    // Store product information

    public function store(Request $request){
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('products','title')],
            'description' => 'required',
            'department' => 'required',
            'price' => 'required',
            'location' => 'required',
            'manufacture' => 'required',
            'tags' => 'required',

        ]);
        $formFields['user_id'] = auth()->id();

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }




        Product::create($formFields);

        return redirect('/products')->with('message', 'Product added successfully');


    }

    // Show edit form

    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);

    }

// Updating product
    public function update(Request $request, Product $product){
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'department' => 'required',
            'price' => 'required',
            'location' => 'required',
            'manufacture' => 'required',
            'tags' => 'required',

        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }


       $product->update($formFields);

        return redirect('/products')->with('message', 'Product updated successfully');


    }



    // Delete product
    public function destroy(Product $product ){

        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully');

    }

    public function manage(){
        return view('products.manage', ['products' =>  auth()->user()->products()->get()]);


    }




}


//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('product.add');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        $newPost = Product::create([
//            'title' => $request->title,
//            'short_notes' => $request->short_notes,
//            'price' => $request->price
//        ]);
//
//        return redirect('product/' . $newPost->id . '/edit');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Product $product)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Product $product)
//    {
//        return view('product.edit', [
//            'product' => $product,
//        ]);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Product $product)
//    {
//        $product->update([
//            'title' => $request->title,
//            'short_notes' => $request->short_notes,
//            'price' => $request->price
//        ]);
//
//        return redirect('product/' . $product->id . '/edit');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Product  $product
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Product $product)
//    {
//        $product->delete();
//        return redirect('product/');
//    }
//
//}
