@extends('layouts.pages')
@section('content')
    <form class="form" method="post" action="{{ url('/login') }}">
        @csrf
        <div class="card card-login">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Login</h4>

            </div>
            @if ($errors->any())
                <span class="bmd-form-group">
                        @foreach ($errors->all() as $error)
                        <div class="bg-danger px-4 py-2 my-2 text-white">{{ $error }}</div>
                    @endforeach
                    </span>
            @endif
            <div class="card-body ">
                <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                  </span>
                <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="password" class="form-control" placeholder="Password...">
                    </div>
                  </span>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-rose btn-round">
                    Login
                    <div class="ripple-container"></div>
                </button>
            </div>
        </div>
    </form>
@endsection
