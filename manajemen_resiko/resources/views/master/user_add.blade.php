@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input User</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('user.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('user.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pengguna">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection