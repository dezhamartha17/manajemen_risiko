<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Department;
use App\Models\Risk;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function show(){
        $activity = Activity::all();
        $activePage = 'activity';


        return view('master.Activity_list', ['activitys' => $activity, 'activePage' => $activePage]);
    }
    public function add(){
        $option1 = Department::all();
        $option2 = Risk::all();
        $activePage = 'activity';
        return view('master.activity_add', ['options1' => $option1, 'options2' => $option2, 'activePage' => $activePage]);
    }
    public function store(Request $request){
        try {
            $request->validate([
                'nama_activity' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:255',
                'department' => 'required|integer',
                'risiko_terkait' => 'required|integer',
            ]);

            $activity = Activity::create([
                'nama_aktivitas' => $request->input('nama_activity'),
                'deskripsi' => $request->input('deskripsi'),
                'department' => $request->input('department'),
                'risiko_terkait' => $request->input('risiko_terkait'),
            ]);

            return redirect()->route('activity.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $activity = Activity::find($id);
        $option1 = Department::all();
        $option2 = Risk::all();
        $selectedDept = $activity->department;
        $selectedRisk = $activity->risiko_terkait;
        $activePage = 'activity';
        if (!$activity) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('master.activity_edit', ['activity' => $activity,'activePage' => $activePage,  'options1' => $option1, 'options2' => $option2, 'selectedDept' => $selectedDept, 'selectedRisk' => $selectedRisk]);
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        if ($activity) {
            $activity->delete();
            return redirect()->route('activity.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('activity.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
                $request->validate([
                    'nama_activity' => 'required|string|max:255',
                    'deskripsi' => 'required|string|max:255',
                    'department' => 'required|integer',
                    'risiko_terkait' => 'required|integer',
                ]);

            $act = Activity::find($id);
            if ($act) {
                $act->update([
                    'nama_aktivitas' => $request->input('nama_activity'),
                    'deskripsi' => $request->input('deskripsi'),
                    'department' => $request->input('department'),
                    'risiko_terkait' => $request->input('risiko_terkait'),
                ]);

                return redirect()->route('activity.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('activity.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('activity.show')->with('error', $e->getMessage());
        }
    }
}
