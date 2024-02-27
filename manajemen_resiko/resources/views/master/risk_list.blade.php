@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Risk</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('risk.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Risiko</th>
                <th>Kategori</th>
                <th>Tingkat Risiko</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($risks as $key => $risk)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $risk->nama_risiko }}</td>
                <td>{{ $risk->kategori }}</td>
                <td>
                    @php
                    // Assuming you have a RiskLevel model
                    $riskLevel = \App\Models\RiskValue::find($risk->tingkat_risiko);
                    // Check if $riskLevel is not null before accessing its properties
                    echo $riskLevel ? $riskLevel->nilai_risiko : 'Unknown Risk Level';
                    @endphp
                    {{-- {{ $risk->tingkat_risiko }} --}}
                </td>
                <td>{{ $risk->deskripsi }}</td>
                <td>
                    <a href="{{ route('risk.edit', $risk->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('risk.destroy', $risk->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
            
            @endforeach

        </tbody>
    </table>
</div>
<!-- Tambahkan script JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');

                if (confirmation) {
                    // Jika dikonfirmasi, kirim formulir delete
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
@endsection
