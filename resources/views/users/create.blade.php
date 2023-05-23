@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <h4 class="card-title">Stacked Form</h4>
                </div>
                <div class="card-body ">
                    <form method="#" action="#">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">Email Address</label>
                            <input type="email" class="form-control" id="exampleEmail">
                        </div>
                        <div class="form-group">
                            <label for="examplePass" class="bmd-label-floating">Password</label>
                            <input type="password" class="form-control" id="examplePass">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value=""> Subscribe to newsletter
                                <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection