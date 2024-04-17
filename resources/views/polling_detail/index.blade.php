@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Polling</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Polling</li>
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
                                <form action="{{ route('polling_detail-create') }}">
                                    <button type="submit" class="btn btn-primary">Tambah Polling Detail</button>
                                </form>
                                <br>
                                <br>
                                <table id="table-mk" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID Polling Detail</th>
                                        <th>ID Polling</th>
                                        <th>ID User</th>
                                        <th>ID Mata Kuliah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pds as $pd)
                                        <tr>
                                            <td>{{ $pd->id_polling_detail }}</td>
                                            <td>{{ $pd->polling_id_polling }}</td>
                                            <td>{{ $pd->user_id_user }}</td>
                                            <td>{{ $pd->mata_kuliah_id_mata_kuliah }}</td>
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

@endsection

@section('ExtraJS')

@endsection
