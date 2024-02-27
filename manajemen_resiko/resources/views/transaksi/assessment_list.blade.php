@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">List Risk Assessment</h2>
    <div class="row ">
        <div class="text-center col-3"><a href="{{ route('assessment.add') }}" class="btn btn-outline-success mb-2">Tambah Data</a></div>
        <div class="col-6"></div>
    </div>
    <table class="table" style="table-layout: fixed; width: 90%; margin: 0 auto;">
        <thead>
            <tr>
                <th>No</th>
                <th>Auditee</th>
                <th>Risiko Terkait</th>
                <th>Temuan</th>
                <th>Tanggal Evaluasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assessment as $key => $assessment)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $assessment->users->name}}</td>
                <td>
                    @php
                    $risk = \App\Models\Risk::find($assessment->activity->risiko_terkait);
                    echo $risk ? $risk->nama_risiko : 'Unknown Risk';
                    @endphp
                </td>
                <td>
                    @php
                    $risikoTerkait = $assessment->activity->risiko_terkait;
                    // Pastikan risiko terkait tidak null
                    // if ($risikoTerkait && is_array($risikoTerkait)) {
                        // Ambil semua dampak dengan risk_id yang terkait dengan aktivitas
                        $dampak = \App\Models\Dampak::where('id_risk', $risikoTerkait)->get();
                        // echo($dampak);
                
                        // Pastikan $dampak adalah array yang dapat dihitung sebelum menggunakannya
                        if ($dampak->isEmpty()) {
                            echo 'Tidak ada temuan';
                        } else {
                            // Tampilkan list nomor dampak
                            $nomorDampak = 1;
                            foreach ($dampak as $d) {
                                echo $nomorDampak . '. ' . ($d ? $d->nama_dampak : 'Unknown Dampak') . '<br>';
                                $nomorDampak++;
                            }
                        }
                    // } else {
                    //     echo 'No Risiko Terkait';
                    // }
                    @endphp
                </td>
                
                {{-- <td>
                    @php
                    $riskvalue = \App\Models\RiskValue::find($assessment->penilaian_risiko);
                    echo $riskvalue ? $riskvalue->nilai_risiko : 'Unknown Risk Value';
                    @endphp
                </td> --}}
                <td>{{\Carbon\Carbon::parse($assessment->tanggal_evaluasi)->format('d F Y') }}</td>
                <td>
                    <a href="{{ route('assessment.edit', $assessment->id) }}" class="btn btn-warning" style="display:inline-block;">Edit</a>
                    <form action="{{ route('assessment.destroy', $assessment->id) }}" method="post" style="display:inline-block;">
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
