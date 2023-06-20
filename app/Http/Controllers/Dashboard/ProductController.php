<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\BidEntry;
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
        $total = BidEntry::where('product_id', $product->id)->count();
        $lastBidder = BidEntry::where('product_id', $product->id)->orderByDesc('created_at')->first();

        return view('products.show', [
            'product' => $product,
            'total' => $total * 20,
            'lastBidder' => $lastBidder,
        ]);
    }

    public function datatable(Request $request)
    {
        $data = Product::query();
        return DataTables::of($data)
            ->addColumn('action', content: function ($row) {
                $showButton = sprintf(
                    '<a href="%s" class="%s"><i class="material-icons">gavel</i> %s</a>',
                    route('products.show', $row),
                    'btn bg-transparent text-info border border-info',
                    'Bid',
                );
                $editButton = sprintf(
                    '<a href="%s" class="%s"><i class="material-icons">edit</i> %s</a>',
                    route('products.edit', $row),
                    'btn bg-transparent text-warning border border-warning',
                    'Edit',
                );
                $deleteButton = sprintf(
                    '<a href="%s" class="%s"><i class="material-icons">delete</i> %s</a>',
                    route('products.confirm-delete', $row),
                    'btn bg-transparent text-danger border border-danger',
                    'Delete',
                );

                return <<<ACTION
                    $showButton $editButton $deleteButton 
                ACTION;
            })
            ->make();
    }
}
