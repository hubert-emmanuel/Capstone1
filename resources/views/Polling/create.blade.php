@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Polling</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ implode('', $errors->all(':message')) }}
                                    </div>
                                @endif
                                @if(Auth::user()->role == 'prodi')
                                        <form method="post" action="{{ route('polling-store-prodi') }}">
                                            @csrf
                                            <div class ="form-group">
                                                <label for="id-p">ID Polling</label>
                                                <input type="text" class="form-control" id="id-p"
                                                       placeholder="Contoh: 1" name="id_polling" required autofocus>
                                            </div>
                                            <div class ="form-group">
                                                <label for="tanggal_mulai-p">Tanggal Mulai Polling</label>
                                                <input type="date" class="form-control" id="tanggal_mulai-p"
                                                       placeholder="Contoh: 2023-4-5" name="tanggal_mulai_polling" required autofocus>
                                            </div>
                                            <div class ="form-group">
                                                <label for="tanggal_akhir-p">Tanggal Akhir Polling</label>
                                                <input type="date" class="form-control" id="tanggal_akhir-p"
                                                       placeholder="Contoh: 2023-5-5" name="tanggal_akhir_polling" required autofocus>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                @endif
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
