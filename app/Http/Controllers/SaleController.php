<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', ['sales'=>$sales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('sales.new', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sale = new Sale();

        $sale->nombre = $request->nombre;
        $sale->documento = $request->buyer_type === 'persona' ? $request->documento : null;
        $sale->razon_social = $request->buyer_type === 'entidad' ? $request->razon_social : null;
        $sale->nit = $request->buyer_type === 'entidad' ? $request->nit : null;

        $total = 0;

        foreach($request->products as $productRequest) {
            $product = Product::find($productRequest['id']);
            $total += $product->precio * $productRequest['quantity'];
        }

        $totalneto = $total * 1.19;

        $sale->total = $totalneto;
        $sale->save();


        $sales = Sale::all();
        return view('sales.index', ['sales'=>$sales]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = Sale::find($id);
        $products = Product::all();
        return view('sales.edit', ['sale' => $sale, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        $sales = Sale::all();
        return view('sales.index', ['sales'=>$sales]);
    }
}
