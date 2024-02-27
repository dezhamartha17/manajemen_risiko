@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Edit User</h2>
        <div class="row ">
            <div class="col-8"></div>
            <div class="col-4"><a href="{{ route('user.show') }}" class="btn btn-outline-success">Kembali</a></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    @method('PUT') {{-- karena Anda menggunakan metode update, gunakan method('PUT') --}}
                    <div class="form-group mb-3">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}" placeholder="Masukkan nama pengguna">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Masukkan alamat email">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
