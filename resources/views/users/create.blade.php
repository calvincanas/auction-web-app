@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <h4 class="card-title">Create a user</h4>
                </div>
                <div class="card-body ">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            @if($errors->first('name'))
                                <label class="error" for="name">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                            @if($errors->first('email'))
                                <label class="error" for="email">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @if($errors->first('password'))
                                <label class="error" for="password">{{ $errors->first('password') }}</label>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Create</button>
                        <a href="{{ route('users.index') }}" class="btn btn-fill btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection