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
