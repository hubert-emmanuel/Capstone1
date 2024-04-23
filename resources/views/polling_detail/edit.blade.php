@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Polling Detail</h1>
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

                                <form method="post" action="{{ route('matakuliah-update', ['matakuliah'=>$mk->id_mata_kuliah]) }}">
                                    @csrf
                                    <div class ="form-group">
                                        <label for="id-mk">ID Mata Kuliah</label>
                                        <input type="text" class="form-control" id="id-mk"
                                               placeholder="Contoh: IN241" name="id_mata_kuliah" required
                                               autofocus value="{{ $mk->id_mata_kuliah }}">
                                    </div>
                                    <div class ="form-group">
                                        <label for="nama-mk">Nama Mata Kuliah</label>
                                        <input type="text" class="form-control" id="nama-mk"
                                               placeholder="Contoh: Statistika" name="nama_mata_kuliah" required
                                               value="{{ $mk->nama_mata_kuliah }}" autofocus>
                                    </div>
                                    <div class ="form-group">
                                        <label for="ps-mk">Program Studi</label>
                                        <input type="text" class="form-control" id="ps-mk"
                                               placeholder="Contoh: Teknik Informatika" name="program_studi" required
                                               value="{{ $mk->program_studi }}" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="kk-mk" class="col-form-label col-sm-2">Kurikulum</label>
                                        <div class="col-sm-8">
                                            <select id="kk-mk" name="kurikulum_id_kurikulum" class="form-control select2">
                                                @foreach($kks as $kk)
                                                    <option name="id_kurikulum" value="{{ $kk->id_kurikulum }}">{{ $kk->id_kurikulum }} - {{ $kk->tahun_ajaran }} - {{ $kk->semester_aktif }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
