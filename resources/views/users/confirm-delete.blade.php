@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">warning</i>
                    </div>
                    <h4 class="card-title">Delete Confirmation</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title my-4">Are you sure you want to delete user: <strong>{{ $user->name }}</strong></h4>
                    <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-rose">Delete</button>
                        <a href="{{ route('users.index') }}" class="btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection