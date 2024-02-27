@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Edit Department</h2>
        <div class="row ">
            <div class="col-8"></div>
            <div class="col-4"><a href="{{ route('department.show') }}" class="btn btn-outline-success">Kembali</a></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('department.update', $department->id) }}">
                    @csrf
                    @method('PUT') {{-- karena Anda menggunakan metode update, gunakan method('PUT') --}}
                    <div class="form-group mb-3">
                        <label for="nama_department">Nama Department:</label>
                        <input type="text" class="form-control" id="nama_department" name="nama_department" value="{{ $department->nama_department }}" placeholder="Masukkan Nama Department">
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $department->deskripsi }}" placeholder="Masukkan Deskripsi">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
