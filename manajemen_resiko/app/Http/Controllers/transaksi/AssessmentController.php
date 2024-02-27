<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Assessment;
use App\Models\Dampak;
use App\Models\Risk;
use App\Models\RiskValue;
use App\Models\Temuan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function show(){
        $assessment = Assessment::with(['users','activity'])->get();

        $activePage = 'assessment';

        return view('transaksi.assessment_list', ['activePage' => $activePage,'assessment' => $assessment]);
    }
    public function add(){
        $risks = Risk::all();
        $activity = Activity::all();
        $users = User::all();
        $risksv = RiskValue::all();
        $dampak = Dampak::all();
        $activePage = 'assessment';

        return view('transaksi.assessment_add', ['activePage' => $activePage,'risks' => $risks, 'users' => $users, 'risksv' => $risksv, 'activity' => $activity, 'dampak' => $dampak]);
    }

    public function getDampakByActivity(Request $request)
    {
        try{
        $activity_id = $request->input('activity_id');
        $risksv = RiskValue::all(); // Sesuaikan dengan model dan logika bisnis Anda
        $riskId = Activity::find($activity_id)->risk_id;
        // dd($riskId);
        $dampak = Dampak::where('id_risk', $riskId)->get(); // Sesuaikan dengan model dan logika bisnis Anda
        // dd($dampak);
        // Kirim HTML checkbox dampak berdasarkan nilai risiko dan activity
        return view('assessment.add', compact('risksv', 'dampak', 'activity_id'));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    public function getImpacts(Request $request)
    {
        // $risk_id = Activity::where('id', $request->input('activity_id')->select('risk_id'));
        $risk_id = Activity::where('id', $request->input('activity_id'))->first()->risiko_terkait;
        $activities = Activity::all();
        // $impacts = [];

        
            $impacts = Dampak::where('id_risk', $risk_id)->get();
        
        // dd($risk_id);

        return response()->json([
            'activities' => $activities,
            'impacts' => $impacts,
        ]);
    }
    public function store(Request $request){
        try {

            $assessment = Assessment::create([
                'user_id' => $request->input('user_id'),
                'activity_id' => $request->input('activity_id'),
                'tanggal_evaluasi' => $request->input('tanggal_evaluasi'),
                'penilaian_risiko' => '1',
            ]);

            $selectedOptions = $request->input('impact_ids', []);

            foreach ($selectedOptions as $selectedOption) {
                $temuan = Temuan::create([
                    'assessment_id' => $assessment->id,
                    'dampak_id' => $selectedOption,
                ]);
            }
            return redirect()->route('assessment.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $assessment = Assessment::find($id);
        $selectedRisk = $assessment->risk_id;
        $selectedUser = $assessment->user_id;
        $selectedPr = $assessment->penilaian_risiko;
        $activePage = 'assessment';
        $risks = Risk::all();
        $users = User::all();
        $risksv = RiskValue::all();
        if (!$assessment) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('transaksi.assessment_edit', ['activePage' => $activePage,'assessment' => $assessment, 'users' => $users, 'risks' => $risks, 'risksv' => $risksv, 'selectedRisk' => $selectedRisk, 'selectedUser' => $selectedUser, 'selectedPr' => $selectedPr]);
    }

    public function destroy($id)
    {
        $assessment = Assessment::find($id);
        if ($assessment) {
            $assessment->delete();
            return redirect()->route('assessment.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('assessment.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $assessment = Assessment::find($id);
            if ($assessment) {
                $assessment->update([
                    'user_id' => $request->input('user_id'),
                    'risk_id' => $request->input('risk_id'),
                    'tanggal_evaluasi' => Carbon::parse($request->input('tanggal_evaluasi'))->format('Y-m-d'),
                    'penilaian_risiko' => $request->input('penilaian_risiko'),
                ]);

                return redirect()->route('assessment.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('assessment.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('assessment.show')->with('error', $e->getMessage());
        }
    }
}
