<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Dampak;
use App\Models\Risk;
use App\Models\RiskValue;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    public function show(){
        $risks = Risk::all();
        $risk_value = RiskValue::all();
        $activePage = 'risk';
        
        return view('master.risk_list', ['activePage' => $activePage,'risks' => $risks, 'risk_value' => $risk_value]);
    }
    public function add(){
        $option = RiskValue::all();
        $activePage = 'risk';

        return view('master.risk_add', ['activePage' => $activePage,'options1' => $option]);
    }
    public function store(Request $request){
        try {
            // $request->validate([
            //     'nama_risiko' => 'required|string|max:255',
            //     'deskripsi' => 'required|string|max:255',
            //     'kategori' => 'required',
            //     // 'tingkat_risiko' => 'required',
            // ]);

            // Matriks risiko
        // $riskMatrix = [
        //     'Tinggi' => [
        //         'Besar' => 9,
        //         'Sedang' => 7,
        //         'Kecil' => 5,
        //     ],
        //     'Sedang' => [
        //         'Besar' => 6,
        //         'Sedang' => 4,
        //         'Kecil' => 2,
        //     ],
        //     'Rendah' => [
        //         'Besar' => 3,
        //         'Sedang' => 2,
        //         'Kecil' => 1,
        //     ],
        // ];

        // // Menghitung nilai risiko berdasarkan kriteria
        // $riskValue = $riskMatrix[$request->input('skala_risiko')][$request->input('skala_dampak')];
        // dd($riskMatrix);
        if ( $request->input('skala_risiko') == '1' &&  $request->input('skala_dampak') == '1') {
            $riskValue = '3';
        } else if ( $request->input('skala_risiko') == '2' &&  $request->input('skala_dampak') == '1'){
            $riskValue = '3';
        } else if ( $request->input('skala_risiko') == '3' &&  $request->input('skala_dampak') == '1'){
            $riskValue = '3';
        } else if ( $request->input('skala_risiko') == '1' &&  $request->input('skala_dampak') == '2'){
            $riskValue = '2';
        } else if ( $request->input('skala_risiko') == '1' &&  $request->input('skala_dampak') == '3'){
            $riskValue = '2';
        } else if ( $request->input('skala_risiko') == '2' &&  $request->input('skala_dampak') == '2'){
            $riskValue = '1';
        } else if ( $request->input('skala_risiko') == '2' &&  $request->input('skala_dampak') == '3'){
            $riskValue = '1';
        } else if ( $request->input('skala_risiko') == '3' &&  $request->input('skala_dampak') == '3'){
            $riskValue = '1';
        }

            $risk = Risk::create([
                'nama_risiko' => $request->input('nama_risiko'),
                'deskripsi' => $request->input('deskripsi'),
                'kategori' => $request->input('kategori'),
                'tingkat_risiko' => $riskValue,
            ]);
            // dd($request->input('deskripsi_dampak'));
            $dampak = Dampak::create([
                'id_risk' => $risk->id,
                'nama_dampak' => $request->input('dampak'),
                'deskripsi_dampak' => $request->input('deskripsi_dampak'),
                'nilai_dampak' => $riskValue,
            ]);
            

            return redirect()->route('risk.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $risk = Risk::find($id);
        $option = RiskValue::all();
        $activePage = 'risk';

        $selectedRiskLevel = $risk->tingkat_risiko;
        if (!$risk) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('master.risk_edit', ['activePage' => $activePage,'risk' => $risk,'options1' => $option, 'selectedRiskLevel' => $selectedRiskLevel]);
    }

    public function destroy($id)
    {
        $risk = Risk::find($id);
        if ($risk) {
            $risk->delete();
            return redirect()->route('risk.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('risk.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
                $request->validate([
                    'nama_risiko' => 'required|string|max:255',
                    'deskripsi' => 'required|string|max:255',
                    'kategori' => 'required',
                    'tingkat_risiko' => 'required|integer',
                ]);

            $user = Risk::find($id);
            if ($user) {
                $user->update([
                    'nama_risiko' => $request->input('nama_risiko'),
                    'deskripsi' => $request->input('deskripsi'),
                    'kategori' => $request->input('kategori'),
                    'tingkat_risiko' => $request->input('tingkat_risiko'),
                ]);

                return redirect()->route('risk.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('risk.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('risk.show')->with('error', $e->getMessage());
        }
    }
}
