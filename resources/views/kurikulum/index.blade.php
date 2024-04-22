@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kurikulum</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kurikulum</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('kurikulum-create') }}">
                                    <button type="submit" class="btn btn-primary">Tambah Kurikulum</button>
                                </form>
                                <br>
                                <br>
                                <table id="table-mk" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID Kurikulum</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kks as $kk)
                                        <tr>
                                            <td>{{ $kk->id_kurikulum }}</td>
                                            <td>
                                                <a href="{{ route('kurikulum-edit', ['kurikulum' => $kk->id_kurikulum]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('kurikulum-delete', ['kurikulum' => $kk->id_kurikulum]) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables.bs4/css/dataTables.bootstrap4.min.css') }}"
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-mk').DataTable();
    </script>
@endsection
