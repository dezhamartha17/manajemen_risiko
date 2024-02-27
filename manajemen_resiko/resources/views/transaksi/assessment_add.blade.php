@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Risk Assessment</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('assessment.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('assessment.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="auditee">Auditee:</label>
                    <select class="form-select" name="user_id" id="auditee">
                        @foreach ($users as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="activity_id">Activity:</label>
                    <select class="form-select" name="activity_id" id="activity_id" onchange="getImpacts()">
                        @foreach ($activity as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_aktivitas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_evaluasi">Tanggal Audit:</label>
                    <input type="date" name="tanggal_evaluasi" class="form-control" id="tanggal_evaluasi" value="{{ old('tanggal_evaluasi') }}">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="riskv">Penilaian Risiko:</label>
                    <select class="form-select" name="penilaian_risiko">
                        @foreach ($risksv as $option)
                            <option value="{{ $option->id }}">{{ $option->nilai_risiko }}</option>
                        @endforeach
                    </select>
                </div> --}}
                    <label for="dampak">Temuan:</label>
                    <br>
                    <div id="impacts-list">

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
