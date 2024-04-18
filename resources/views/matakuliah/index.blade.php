@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mata Kuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mata Kuliah</li>
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
                                @if(Auth::user()->role == 'admin')
                                    <form action="{{ route('matakuliah-create') }}">
                                        <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
                                    </form>
                                @endif
                                <br>
                                <br>
                                <table id="table-mk" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mata Kuliah</th>
                                        <th>Program Studi</th>
                                        <th>Aksi</th>
                                        <th>Foto</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mks as $mk)
                                        <tr>
                                            <td>{{ $mk->id_mata_kuliah }}</td>
                                            <td>{{ $mk->nama_mata_kuliah }}</td>
                                            <td>{{ $mk->program_studi }}</td>
                                            <td><img src="{{ asset('storage/' . $mk->foto) }}" alt="foto" class="img-thumbnail" style="max-width:100px"></td>
                                            @if(Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ route('matakuliah-edit', ['mataKuliah' => $mk->id_mata_kuliah]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('matakuliah-delete', ['matakuliah' => $mk->id_mata_kuliah]) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                                                </td>
                                            @endif
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
    <link rel="stylesheet" href="{{ asset('plugins/datatables.bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-mk').DataTable();
        $('.del-button').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure want to delete?",
                showCancelButton: true,
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location = this.href;
                }
            });
        });
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
