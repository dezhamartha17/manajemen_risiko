@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Activity</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('activity.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Activitas</th>
                <th>Deskripsi</th>
                <th>Departemen</th>
                <th>Resiko Terkait</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activitys as $key => $activity)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $activity->nama_aktivitas }}</td>
                <td>{{ $activity->deskripsi }}</td>
                <td>
                    @php
                    $department = \App\Models\Department::find($activity->department);
                    echo $department ? $department->nama_department : 'Unknown Departemen';
                    @endphp
                </td>
                <td>
                    @php
                    $risk = \App\Models\Risk::find($activity->risiko_terkait);
                    echo $risk ? $risk->nama_risiko : 'Unknown Risk';
                    @endphp
                </td>
                <td>
                    <a href="{{ route('activity.edit', $activity->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('activity.destroy', $activity->id) }}" method="post" style="display:inline-block;">
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
