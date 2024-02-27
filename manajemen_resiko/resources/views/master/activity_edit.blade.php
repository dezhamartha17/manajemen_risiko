@extends('layouts.main')

@section('content')
    <div class="container mt-5">
                <h2 class="text-center mb-4">Form Edit Activity</h2>
            <div class="row ">
                <div class="col-8"></div>
                <div class="col-4"><a href="{{ route('activity.show') }}" class="btn btn-outline-success">Kembali</a></div>
            </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('activity.update', $activity->id) }}">
                    @csrf
                    @method('PUT') {{-- karena Anda menggunakan metode update, gunakan method('PUT') --}}
                    <div class="form-group mb-3">
                        <label for="nama">Nama Activity:</label>
                        <input type="text" class="form-control" id="nama" name="nama_activity" value="{{ $activity->nama_aktivitas }}" placeholder="Masukkan Nama Activity">
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $activity->deskripsi }}" placeholder="Masukkan Deskripsi">
                    </div>
                    <div class="form-group mb-3">
                        <label for="department">Department:</label>
                        <select class="form-select" name="department">
                            @foreach ($options1 as $option)
                                <option value="{{ $option->id }}" {{ $option->id == $selectedDept ? 'selected' : '' }}>{{ $option->nama_department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="risiko">Risiko Terkait:</label>
                        <select class="form-select" name="risiko_terkait">
                            @foreach ($options2 as $option2)
                                <option value="{{ $option2->id }}" {{ $option->id == $selectedRisk ? 'selected' : '' }}>{{ $option2->nama_risiko }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
