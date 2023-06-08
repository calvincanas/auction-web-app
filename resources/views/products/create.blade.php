@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <h4 class="card-title">Create a product</h4>
                </div>
                <div class="card-body ">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            @error('name')
                                <label class="error" for="name">{{ $errors->first('name') }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Create</button>
                        <a href="{{ route('products.index') }}" class="btn btn-fill btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection