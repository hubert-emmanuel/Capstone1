@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Kurikulum</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
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
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        {{ implode('', $errors->all(':message')) }}
                                    </div>
                                @endif

                                <form method="post" action="{{ route('kurikulum-update', ['kurikulum'=>$kk->id_kurikulum]) }}">
                                    @csrf
                                    <div class ="form-group">
                                        <label for="id-kk">ID Kurikulum</label>
                                        <input type="text" class="form-control" id="id-kk"
                                               placeholder="Contoh: 2013" name="id_kurikulum" required autofocus
                                                value="{{ $kk->id_kurikulum }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>

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
