@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Edit Risk Assessment</h2>
    <div class="row ">
        <div class="col-8"></div>
        <div class="col-4"><a href="{{ route('assessment.show') }}" class="btn btn-outline-success">Kembali</a></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="{{route('assessment.update', $assessment->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="user">User:</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $option)
                            <option value="{{ $option->id }}" {{ $option->id == $selectedUser ? 'selected' : '' }}>{{ $option->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="risk">Risiko:</label>
                    <select class="form-select" name="risk_id">
                        @foreach ($risks as $option)
                            <option value="{{ $option->id }}" {{ $option->id == $selectedRisk ? 'selected' : '' }}>{{ $option->nama_risiko }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggal_evaluasi">Tanggal Evaluasi:</label>
                    <input type="date" name="tanggal_evaluasi" class="form-control" value="{{ old('tanggal_evaluasi', optional($assessment)->tanggal_evaluasi) }}">
                </div>
                <div class="form-group mb-3">
                    <label for="riskv">Penilaian Risiko:</label>
                    <select class="form-select" name="penilaian_risiko">
                        @foreach ($risksv as $option)
                            <option value="{{ $option->id }}" {{ $option->id == $selectedPr ? 'selected' : '' }}>{{ $option->nilai_risiko }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
