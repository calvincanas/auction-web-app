@extends('layouts.app')

@section('content')
    Dashboard Index
@endsection

@section('footer-js')
    <script type="module">
        console.log(window.Pusher)
        Echo.private(`users.1`)
            .listen('ShoutoutToUser', (e) => {
                console.log('ShoutoutDashboard', e.user.name)
            })
    </script>
@endsection