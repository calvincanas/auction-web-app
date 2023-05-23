@extends('layouts.app')

@section('content')
    Dashboard Index
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="logout">
    </form>
@endsection