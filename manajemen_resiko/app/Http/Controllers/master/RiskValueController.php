<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\RiskValue;
use Illuminate\Http\Request;

class RiskValueController extends Controller
{
    public function show(){
        $riskvalue = RiskValue::all();
        $activePage = 'riskvalue';

        return view('master.riskvalue_list', ['activePage' => $activePage,'riskvalues' => $riskvalue]);
    }
    public function add(){
        $activePage = 'riskvalue';

        return view('master.riskvalue_add', ['activePage' => $activePage,]);
    }
    public function store(Request $request){
        try {
            $request->validate([
                'nilai_risiko' => 'required|string|max:255',
                'keterangan' => 'required|string|max:255',
            ]);

            $RiskValue = RiskValue::create([
                'nilai_risiko' => $request->input('nilai_risiko'),
                'keterangan' => $request->input('keterangan'),
            ]);

            return redirect()->route('riskvalue.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $riskvalue = RiskValue::find($id);
        $activePage = 'riskvalue';

        if (!$riskvalue) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('master.riskvalue_edit', ['activePage' => $activePage,'riskvalue' => $riskvalue]);
    }

    public function destroy($id)
    {
        $riskvalue = RiskValue::find($id);
        if ($riskvalue) {
            $riskvalue->delete();
            return redirect()->route('riskvalue.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('riskvalue.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
                $request->validate([
                    'nilai_risiko' => 'required|string|max:255',
                    'keterangan' => 'required|string|max:255',

                ]);

            $depart = RiskValue::find($id);
            if ($depart) {
                $depart->update([
                    'nilai_risiko' => $request->input('nilai_risiko'),
                    'keterangan' => $request->input('keterangan'),

                ]);

                return redirect()->route('riskvalue.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('riskvalue.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('riskvalue.show')->with('error', $e->getMessage());
        }
    }
}
