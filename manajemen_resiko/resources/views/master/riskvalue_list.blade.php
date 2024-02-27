@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Risk Value</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('riskvalue.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nilai Risiko</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($riskvalues as $key => $riskvalue)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $riskvalue->nilai_risiko }}</td>
                <td>{{ $riskvalue->keterangan }}</td>
                <td>
                    <a href="{{ route('riskvalue.edit', $riskvalue->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('riskvalue.destroy', $riskvalue->id) }}" method="post" style="display:inline-block;">
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
