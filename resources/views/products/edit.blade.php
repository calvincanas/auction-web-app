@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <h4 class="card-title">Edit Product</h4>
                </div>
                <div class="card-body ">
                    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating" >Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-fill btn-rose" value="Update" />
                            <a href="{{ route('products.index') }}" class="btn btn-fill btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection