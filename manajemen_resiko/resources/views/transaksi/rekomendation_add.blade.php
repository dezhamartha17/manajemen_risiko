@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Recommendation</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('recommendation.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('recommendation.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="user">User:</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="risiko">Risiko:</label>
                    <select class="form-select" name="risk_id">
                        @foreach ($risks as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_risiko }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_rekomendasi">Tanggal Rekomendasi:</label>
                    <input type="date" name="tanggal_rekomendasi" class="form-control" value="{{ old('tanggal_rekomendasi') }}">
                    
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi_rekomendasi">Deskripsi Rekomendasi:</label>
                    <input type="text" class="form-control" id="deskripsi_rekomendasii" name="deskripsi_rekomendasi" placeholder="Masukkan Deskripsi Rekomendasi">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
