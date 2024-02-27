@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Recommendation</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('recommendation.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Risiko Direkomendasikan</th>
                <th>User Terkait</th>
                <th>Tanggal Rekomendasi</th>
                <th>Deskripsi Rekomendasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recommendations as $key => $recommendation)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @php
                    $risk = \App\Models\Risk::find($recommendation->risk_id);
                    echo $risk ? $risk->nama_risiko : 'Unknown Risk';
                    @endphp
                </td>
                <td>
                    @php
                    $user = \App\Models\User::find($recommendation->user_id);
                    // $department = \App\Models\Department::find($activity->department);
                    echo $user ? $user->name : 'Unknown user';
                    @endphp
                </td>
                <td>{{\Carbon\Carbon::parse($recommendation->tanggal_rekomendasi)->format('d F Y') }}</td>
                <td>{{$recommendation->deskripsi_rekomendasi}}</td>
                <td>
                    <a href="{{ route('recommendation.edit', $recommendation->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('recommendation.destroy', $recommendation->id) }}" method="post" style="display:inline-block;">
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
