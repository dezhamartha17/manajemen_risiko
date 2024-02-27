@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Monitoring</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('monitoring.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Aktivitas</th>
                <th>Department Terkait</th>
                <th>Risiko Terkait</th>
                <th>Tanggal Monitoring</th>
                <th>Deskripsi Monitoring</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monitorings as $key => $monitoring)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @php
                    $activity = \App\Models\Activity::find($monitoring->activity_id);
                    echo $activity ? $activity->nama_aktivitas : 'Unknown Aktivity';
                    @endphp
                </td>
                <td>
                    @php
                    $activity = \App\Models\Activity::find($monitoring->activity_id);
                    $department = \App\Models\Department::find($activity->department);
                    echo $department ? $department->nama_department : 'Unknown Department';
                    @endphp
                </td>
                <td>
                    @php
                    $activity = \App\Models\Activity::find($monitoring->activity_id);
                    $risk = \App\Models\Risk::find($activity->risiko_terkait);
                    echo $risk ? $risk->nama_risiko : 'Unknown Risk';
                    @endphp
                </td>
                <td>{{\Carbon\Carbon::parse($monitoring->tanggal_monitoring)->format('d F Y') }}</td>
                <td>{{$monitoring->deskripsi_monitoring}}</td>
                <td>
                    <a href="{{ route('monitoring.edit', $monitoring->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('monitoring.destroy', $monitoring->id) }}" method="post" style="display:inline-block;">
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
