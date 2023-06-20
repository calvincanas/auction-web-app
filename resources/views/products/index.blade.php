@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('products.create') }}" class="btn btn-info"><i class="material-icons">add</i> Create Product</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
                <i class="material-icons">store</i>
            </div>
            <h4 class="card-title">Products</h4>
        </div>
        <div class="card-body">
            <div class="material-datatables">
                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
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
                ajax: '{{ route('products.datatable') }}',
                processing: true,
                serverSide: true,
                responsive: true,
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action' },
                ],
                language: {
                    searchPlaceholder: "Search products",
                }
            });
        });
    </script>
@endsection