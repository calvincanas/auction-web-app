<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        Product::create($request->validated());

        return redirect(route('products.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }

    public function confirmDelete(Product $product)
    {
        return view('products.confirm-delete', [
            'product' => $product
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function datatable(Request $request)
    {
        $data = Product::query();
        return DataTables::of($data)
            ->addColumn('action', content: function ($row) {
                $showButton = sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    route('products.show', $row),
                    'btn btn-primary',
                    'Show',
                );
                $editButton = sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    route('products.edit', $row),
                    'btn btn-warning',
                    'Edit',
                );
                $deleteButton = sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    route('products.confirm-delete', $row),
                    'btn btn-danger',
                    'Delete',
                );

                return <<<ACTION
                    $showButton $editButton $deleteButton 
                ACTION;
            })
            ->make();
    }
}
