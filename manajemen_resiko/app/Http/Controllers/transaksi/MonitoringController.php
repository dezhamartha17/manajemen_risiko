<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Monitoring;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function show(){
        $monitoring = Monitoring::all();
        $activePage = 'monitoring';

        return view('transaksi.monitoring_list', ['activePage' => $activePage,'monitorings' => $monitoring]);
    }
    public function add(){
        $activitys = Activity::all();
        $users = User::all();
        $activePage = 'monitoring';

        return view('transaksi.monitoring_add', ['activePage' => $activePage,'activitys' => $activitys, 'users' => $users]);
    }
    public function store(Request $request){
        try {
            $request->validate([
                'activity_id' => 'required|integer',
                'user_id' => 'required|integer',
                'tanggal_monitoring' => 'required|date',
                'deskripsi_monitoring' => 'required|string|max:255',
            ]);

            $monitoring = Monitoring::create([
                'activity_id' => $request->input('activity_id'),
                'user_id' => $request->input('user_id'),
                'tanggal_monitoring' => $request->input('tanggal_monitoring'),
                'deskripsi_monitoring' => $request->input('deskripsi_monitoring'),
            ]);

            return redirect()->route('monitoring.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $monitoring = Monitoring::find($id);
        $activitys = Activity::all();
        $selectedAct = $monitoring->activity_id;
        $selectedUser = $monitoring->user_id;
        $activePage = 'monitoring';
        $users = User::all();
        if (!$monitoring) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('transaksi.monitoring_edit', ['activePage' => $activePage,'monitoring' => $monitoring, 'activitys' => $activitys, 'users' => $users, 'selectedAct' => $selectedAct, 'selectedUser' => $selectedUser]);
    }

    public function destroy($id)
    {
        $monitoring = Monitoring::find($id);
        if ($monitoring) {
            $monitoring->delete();
            return redirect()->route('monitoring.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('monitoring.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $monitoring = Monitoring::find($id);
            if ($monitoring) {
                $monitoring->update([
                    'activity_id' => $request->input('activity_id'),
                    'user_id' => $request->input('user_id'),
                    'tanggal_monitoring' => Carbon::parse($request->input('tanggal_monitoring'))->format('Y-m-d'),
                    'deskripsi_monitoring' => $request->input('deskripsi_monitoring'),
                ]);

                return redirect()->route('monitoring.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('monitoring.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('monitoring.show')->with('error', $e->getMessage());
        }
    }
}
