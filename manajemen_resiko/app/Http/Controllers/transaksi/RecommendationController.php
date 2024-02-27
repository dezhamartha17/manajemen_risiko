<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
use App\Models\Recomendation;
use App\Models\Risk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function show(){
        $recommendations = Recomendation::all();
        $activePage = 'recommendation';

        return view('transaksi.rekomendation_list', ['activePage' => $activePage,'recommendations' => $recommendations]);
    }
    public function add(){
        $risks = Risk::all();
        $users = User::all();
        $activePage = 'recommendation';

        return view('transaksi.rekomendation_add', ['activePage' => $activePage,'risks' => $risks, 'users' => $users]);
    }
    public function store(Request $request){
        try {
            $request->validate([
                'user_id' => 'required|integer',
                'risk_id' => 'required|integer',
                'tanggal_rekomendasi' => 'required|date',
                'deskripsi_rekomendasi' => 'required|string',
            ]);
            // dd($request->validate);

            $recommendation = Recomendation::create([
                'user_id' => $request->input('user_id'),
                'risk_id' => $request->input('risk_id'),
                'tanggal_rekomendasi' => $request->input('tanggal_rekomendasi'),
                'deskripsi_rekomendasi' => $request->input('deskripsi_rekomendasi'),
            ]);

            return redirect()->route('recommendation.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $recommendation = Recomendation::find($id);
        $selectedRisk = $recommendation->risk_id;
        $selectedUser = $recommendation->user_id;
        $activePage = 'recommendation';
        $risks = Risk::all();
        $users = User::all();
        if (!$recommendation) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('transaksi.rekomendation_edit', ['activePage' => $activePage,'recommendation' => $recommendation, 'users' => $users, 'risks' => $risks, 'selectedRisk' => $selectedRisk, 'selectedUser' => $selectedUser]);
    }

    public function destroy($id)
    {
        $recommendation = Recomendation::find($id);
        if ($recommendation) {
            $recommendation->delete();
            return redirect()->route('recommendation.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('recommendation.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $recommendation = Recomendation::find($id);
            if ($recommendation) {
                $recommendation->update([
                    'user_id' => $request->input('user_id'),
                    'risk_id' => $request->input('risk_id'),
                    'tanggal_rekomendasi' => Carbon::parse($request->input('tanggal_rekomendasi'))->format('Y-m-d'),
                    'penilaian_rekomendasi' => $request->input('penilaian_rekomendasi'),
                ]);

                return redirect()->route('recommendation.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('recommendation.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('recommendation.show')->with('error', $e->getMessage());
        }
    }
}
