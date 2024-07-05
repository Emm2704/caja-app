<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleDetail;

use PDF;

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
        //enviar los de stock mayor que 0
        $products = Product::where('stock', '>', 0)->get();
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

        //guardar en el detalle
        foreach ($request->products as $productRequest) {
            $product = Product::find($productRequest['id']);
            $saleDetail = new SaleDetail();
            $saleDetail->sale_id = $sale->id;
            $saleDetail->product_id = $product->id;
            $saleDetail->cantidad = $productRequest['quantity'];
            $saleDetail->precio = $product->precio;
            $saleDetail->save();

            $product->stock -= $productRequest['quantity'];
            $product->save();
        }

        $sales = Sale::all();
        return view('sales.index', ['sales'=>$sales]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::with('details.product')->findOrFail($id);
        return view('sales.show', ['sale' => $sale]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sale = Sale::with('details.product')->findOrFail($id);
        $products = Product::where('stock', '>', 0)->get();
        return view('sales.edit', ['sale' => $sale, 'products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sale = Sale::findOrFail($id);

        $sale->nombre = $request->nombre;
        $sale->documento = $request->buyer_type === 'persona' ? $request->documento : null;
        $sale->razon_social = $request->buyer_type === 'entidad' ? $request->razon_social : null;
        $sale->nit = $request->buyer_type === 'entidad' ? $request->nit : null;

        $total = 0;

        foreach ($request->products as $productRequest) {
            $product = Product::findOrFail($productRequest['id']);
            $total += $product->precio * $productRequest['quantity'];
        }

        $totalWithIva = $total * 1.19;

        $sale->total = $totalWithIva;
        $sale->save();

        // Eliminar los detalles antiguos
        SaleDetail::where('sale_id', $sale->id)->delete();

        // Crear los nuevos detalles de venta
        foreach ($request->products as $index => $productRequest) {
            $product = Product::findOrFail($productRequest['id']);
            $saleDetail = new SaleDetail();
            $saleDetail->sale_id = $sale->id;
            $saleDetail->product_id = $product->id;
            $saleDetail->cantidad = $productRequest['quantity'];
            $saleDetail->precio = $product->precio;
            $saleDetail->save();

            $product->stock -= $productRequest['quantity'];
            $product->save();
        }

        $sales = Sale::all();
        return view('sales.index', ['sales' => $sales]);
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

    //para generar los PDF
    public function generatePDF($id)
    {
        $sale = Sale::with('details.product')->findOrFail($id);

        $pdf = PDF::loadView('sales.pdf', compact('sale'));
        
        return $pdf->download('factura_'.$sale->id.'.pdf');
    }
}
