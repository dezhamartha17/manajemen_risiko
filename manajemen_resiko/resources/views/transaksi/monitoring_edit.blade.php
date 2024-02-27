@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Edit Monitoring</h2>
        <div class="row ">
            <div class="col-8"></div>
            <div class="col-4"><a href="{{ route('monitoring.show') }}" class="btn btn-outline-success">Kembali</a></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('monitoring.update', $monitoring->id) }}">
                    @csrf
                    @method('PUT') {{-- karena Anda menggunakan metode update, gunakan method('PUT') --}}
                    <div class="form-group mb-3">
                        <label for="aktivitas">Aktivitas:</label>
                        <select class="form-select" name="activity_id">
                            @foreach ($activitys as $option)
                                <option value="{{ $option->id }}" {{ $option->id == $selectedAct ? 'selected' : '' }}>{{ $option->nama_aktivitas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="user">User:</label>
                        <select class="form-select" name="user_id">
                            @foreach ($users as $option)
                                <option value="{{ $option->id }} {{ $option->id == $selectedUser ? 'selected' : '' }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_monitoring">Tanggal Monitoring:</label>
                        <input type="date" name="tanggal_monitoring" class="form-control" value="{{ old('tanggal_monitoring', optional($monitoring)->tanggal_monitoring) }}">
                        
                        @error('tanggal_monitoring')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi Monitoring:</label>
                        <input type="text" class="form-control" id="nama" name="deskripsi_monitoring" value="{{ $monitoring->deskripsi_monitoring}}" placeholder="Masukkan Deskripsi Monitoring">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
