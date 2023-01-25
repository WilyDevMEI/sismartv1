<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $products = Product::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($products)
                ->editColumn('name_company', function ($products) {
                    return $products->konsumen->name_company;
                })
                ->editColumn('action', function ($products) {
                    return '
                            <a href="' . route('product.show', $products->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('product.edit', $products->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('product.destroy', $products->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.product.product', compact('products', 'konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create product')) {
            abort(403);
        }
        Product::create($request->all());
        return redirect()->back()->with("success", "Data produk dan jasa telah ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(!Auth::user()->hasPermissionTo('edit product')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.product.edit', compact(['product', 'konsumens']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(!Auth::user()->hasPermissionTo('edit product')) {
            abort(405);
        }
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Data produk & jasa telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(!Auth::user()->hasPermissionTo('delete product')) {
            abort(403);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Data produk & jasa telah dihapus');
    }
}
