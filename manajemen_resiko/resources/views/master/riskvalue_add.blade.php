@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Risk Value</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('riskvalue.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('riskvalue.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nilai Risiko:</label>
                    <input type="text" class="form-control" id="nama" name="nilai_risiko" placeholder="Masukkan Nilai Risiko">
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi">Keterangan:</label>
                    <input type="text" class="form-control" id="deskripsi" name="keterangan" placeholder="Masukkan Keterangan">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
