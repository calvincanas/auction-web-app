@extends('layouts.app')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-warning">Create User</a>
    <div class="card">
        <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
                <i class="material-icons">people</i>
            </div>
            <h4 class="card-title">Users</h4>
        </div>
        <div class="card-body">
            <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer-js')
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                ajax: '{{ route('users.datatable') }}',
                processing: true,
                serverSide: true,
                responsive: true,
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' },
                ],
                language: {
                    searchPlaceholder: "Search users",
                }
            });
        });
    </script>
@endsection