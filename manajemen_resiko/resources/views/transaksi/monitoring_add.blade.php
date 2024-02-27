@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Monitoring</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('monitoring.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('monitoring.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="aktivitas">Aktivitas:</label>
                    <select class="form-select" name="activity_id">
                        @foreach ($activitys as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_aktivitas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="user">User:</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_monitoring">Tanggal Monitoring:</label>
                    <input type="date" name="tanggal_monitoring" class="form-control" value="{{ old('tanggal_monitoring') }}">
                    
                    @error('tanggal_monitoring')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Monitoring:</label>
                    <input type="text" class="form-control" id="nama" name="deskripsi_monitoring" placeholder="Masukkan Deskripsi Monitoring">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
