@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Polling Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Polling Detail</li>
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

                                <form method="post" action="{{ route('polling_detail-store-prodi') }}">
                                    @csrf
                                    <div class ="form-group">
                                        <label for="id-pld">ID Polling Detail</label>
                                        <input type="text" class="form-control" id="id-pld"
                                               placeholder="Contoh: P01" name="id_polling_detail" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="p-id" class="col-form-label col-sm-2">ID Polling</label>
                                        <div class="col-sm-8">
                                            <select id="p-id" name="polling_id_polling" required class="form-control select2">
                                                @foreach($ps as $p)
                                                    <option name="id_polling" value="{{ $p->id_polling }}">{{ $p->id_polling }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-id" class="col-form-label col-sm-2">ID User</label>
                                        <div class="col-sm-8">
                                            <select id="user-id" name="users_id" required class="form-control select2">
                                                @foreach($users as $user)
                                                    <option name="id_user" value="{{ $user->id }}">{{ $user->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><div class="form-group">
                                        <label for="mk-id" class="col-form-label col-sm-2">ID Mata Kuliah</label>
                                        <div class="col-sm-8">
                                            <select id="mk-id" name="mata_kuliah_id_mata_kuliah" required class="form-control select2">
                                                @foreach($mks as $mk)
                                                    <option name="id_mata_kuliah" value="{{ $mk->id_mata_kuliah }}">{{ $mk->id_mata_kuliah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
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
