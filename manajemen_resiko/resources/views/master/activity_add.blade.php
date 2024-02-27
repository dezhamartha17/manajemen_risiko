@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Activity</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('activity.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('activity.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama Activity:</label>
                    <input type="text" class="form-control" id="nama" name="nama_activity" placeholder="Masukkan Nama Activity">
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
                </div>
                <div class="form-group mb-3">
                    <label for="department">Department:</label>
                    <select class="form-select" name="department">
                        @foreach ($options1 as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="risiko">Risiko Terkait:</label>
                    <select class="form-select" name="risiko_terkait">
                        @foreach ($options2 as $option2)
                            <option value="{{ $option2->id }}">{{ $option2->nama_risiko }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
