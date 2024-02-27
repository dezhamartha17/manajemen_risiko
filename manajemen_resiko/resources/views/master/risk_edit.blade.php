@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Edit Risk</h2>
        <div class="row ">
            <div class="col-8"></div>
            <div class="col-4"><a href="{{ route('risk.show') }}" class="btn btn-outline-success">Kembali</a></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="{{ route('risk.update', $risk->id) }}">
                    @csrf
                    @method('PUT') {{-- karena Anda menggunakan metode update, gunakan method('PUT') --}}
                    <div class="form-group mb-3">
                        <label for="nama_risiko">Nama Risiko:</label>
                        <input type="text" class="form-control" id="nama_risiko" name="nama_risiko" value="{{ $risk->nama_risiko }}" placeholder="Masukkan Nama Risiko">
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi:</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $risk->deskripsi }}" placeholder="Masukkan Deskripsi">
                    </div>
                    <div class="form-group mb-3">
                        <label for="kategori">Kategori:</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $risk->deskripsi }}"  placeholder="Masukkan Kategori">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tingkat_risiko">Tingkat Risiko:</label>
                        <select class="form-select" name="tingkat_risiko">
                            @foreach ($options1 as $option)
                                <option value="{{ $option->id }}" {{ $option->id == $selectedRiskLevel ? 'selected' : '' }}>
                                    {{ $option->nilai_risiko }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
