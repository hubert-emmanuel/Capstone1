@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
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

                                    <form method="post" action="{{ route('matakuliah-store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class ="form-group">
                                        <label for="id-mk">ID Mata Kuliah</label>
                                        <input type="text" class="form-control" id="id-mk"
                                               placeholder="Contoh: IN241" name="id_mata_kuliah" required autofocus>
                                    </div>
                                    <div class ="form-group">
                                        <label for="nama-mk">Nama Mata Kuliah</label>
                                        <input type="text" class="form-control" id="nama-mk"
                                               placeholder="Contoh: Statistika" name="nama_mata_kuliah" required autofocus>
                                    </div>
                                    <div class ="form-group">
                                        <label for="ps-mk">Program Studi</label>
                                        <input type="text" class="form-control" id="ps-mk"
                                               placeholder="Contoh: Teknik Informatika" name="program_studi" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="kk-mk" class="col-form-label col-sm-2">Kurikulum</label>
                                        <div class="col-sm-8">
                                            <select id="kk-mk" name="kurikulum_id_kurikulum" required class="form-control select2">
                                                @foreach($kks as $kk)
                                                    <option name="id_kurikulum" value="{{ $kk->id_kurikulum }}">{{ $kk->id_kurikulum }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="sks-mk" class="col-form-label col-sm-2">SKS</label>
                                            <div class="col-sm-8">
                                                <select id="sks-mk" name="SKS" required class="form-control select2">
                                                    <option name="SKS" value="1">1</option>
                                                    <option name="SKS" value="2">2</option>
                                                    <option name="SKS" value="3">3</option>
                                                    <option name="SKS" value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class ="form-group">
                                        <label for="mk-foto" class="col-form-label col-sm-2">Foto</label>
                                        <div class="col-sm-4">
                                            <input type="file" id="mk-foto" name="foto">
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
