@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Tabel Risk</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('risk.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('risk.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama">Nama Risiko:</label>
                    <input type="text" class="form-control" id="nama" name="nama_risiko" placeholder="Masukkan Nama Risiko">
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Risiko:</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
                </div>
                <div class="form-group mb-3">
                    <label for="kategori">Kategori:</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori">
                </div>
                <div class="form-group mb-3">
                    <label for="skala_risiko">Probabilitas Terjadi Risiko :</label>
                    <select class="form-select"  id="skala_risiko" name="skala_risiko">
                            <option value='1'>Rendah</option>
                            <option value='2'>Sedang</option>
                            <option value='3'>Tinggi</option>
                    </select>
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="tingkat_risiko">Tingkat Risiko:</label>

                    <select class="form-select" name="tingkat_risiko">
                        @foreach ($options1 as $option)
                            <option value="{{ $option->id }}">{{ $option->nilai_risiko }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group mb-3">
                    <label for="skala_dampak">Skala Dampak :</label>
                    <select class="form-select"id="skala_dampak" name="skala_dampak">
                            <option value='1'>Kecil</option>
                            <option value='2'>Sedang</option>
                            <option value='3'>Besar</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="dampak">Dampak Yang Ditimbulkan :</label>
                    <input type="text" class="form-control" id="dampak" name="dampak" placeholder="Masukkan Dampak yang Ditimbulkan">
                </div>
                <div class="form-group mb-3">
                    <label for="deskripsi_dampak">Deskripsi Dampak :</label>
                    <input type="text" class="form-control" id="deskripsi_dampak" name="deskripsi_dampak" placeholder="Masukkan Deskripsi Dampak">
                </div>
                {{-- <div class="form-group">
                    <label for="scaleValue">Skala Kerugian Yang Ditimbulkan: Rp:<span id="scaleLabel"> </span></label>
                    <input type="range" id="scaleValue" name="scaleValue" min="1000000" max="10000000" value="5000000" class="form-control-range">
                </div> --}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
