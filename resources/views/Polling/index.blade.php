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
                                @if(session('alert'))
                                    <div class="alert alert-danger">
                                        {{ session('alert') }}
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(Auth::user()->role == 'prodi')
                                    <form action="{{ route('polling-create-prodi') }}">
                                        <button type="submit" class="btn btn-primary">Tambah Polling</button>
                                    </form>
                                @endif
                                <br>
                                <br>
                                <table id="table-p" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID Polling</th>
                                        <th>Tanggal Mulai Polling</th>
                                        <th>Tanggal Akhir Polling</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ps as $p)
                                        <tr>
                                            <td>{{ $p->id_polling }}</td>
                                            <td>{{ $p->tanggal_mulai_polling }}</td>
                                            <td>{{ $p->tanggal_akhir_polling }}</td>
                                            @if(Auth::user()->role == 'prodi')
                                                <td>
                                                    <a href="{{ route('polling-edit-prodi', ['polling' => $p->id_polling]) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('polling-delete-prodi', ['polling' => $p->id_polling]) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                                                </td>
                                            @endif
                                            @if(Auth::user()->role == 'mahasiswa')
                                                <td>
                                                    <a href="{{ route('matakuliah-list-mahasiswa') }}" class="btn btn-outline-warning" role="button" data-deadline="{{ $p->tanggal_akhir_polling }}"><i class="fas fa-vote-yea"></i></a>
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
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script>
        $('.btn-outline-warning').on('click', function() {
            var deadline = $(this).data('deadline');
            checkPollingDeadline(deadline);
        });
        function checkPollingDeadline(deadline) {
            var now = new Date();
            var endPolling = new Date(deadline);

            if (now > endPolling) {
                alert("Waktu polling telah berakhir. Anda tidak bisa mengakses halaman ini lagi.");
                event.preventDefault();
            } else {
                window.location.href = "{{ route('matakuliah-list-mahasiswa') }}";
            }
        }
    </script>

    <script>
        $('#table-p').DataTable();
        $('.btn-danger').on('click', function (e) {
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
