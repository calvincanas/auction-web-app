@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <h4 class="card-title">Confirm Delete</h4>
                </div>
                <div class="card-body ">
                    <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <h3>Delete Confirmation </h3>
                        <p>#{{ $product->id }}</p>
                        <p>{{ $product->name }}</p>
                        <input type="submit" class="btn btn-fill btn-rose" value="Delete" />
                        <a href="{{ route('products.index') }}" class="btn btn-fill btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection