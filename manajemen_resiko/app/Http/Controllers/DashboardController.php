<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Assessment;
use App\Models\Department;
use App\Models\Monitoring;
use App\Models\Recomendation;
use App\Models\RiskValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $assessments = Assessment::with('riskValue')->get();
        $data = [];
        $labels = [];
        // $monitorings = Monitoring::with('activity.department_join')
        // ->groupBy('activity.department')
        // ->select('activity.department', 'department.nama_department', DB::raw('COUNT(activity.department) as jumlah_monitoring'))
        // ->join('department', 'activity.department', '=', 'department.id')
        // ->get();
        $monitorings = Monitoring::join('activity', 'monitoring.activity_id', '=', 'activity.id')
        ->select('activity.department', DB::raw('COUNT(activity.department) AS jumlah_monitoring'))
        ->groupBy('activity.department')
        ->get();
        // dd($monitorings->department);
        $activitys = Activity::get();
        $departments = Department::get();
        $dataM = [];
        $labelsM = [];
        $recommendations = Recomendation::groupBy('risk_id')->select('risk_id',DB::raw('COUNT(risk_id) as jumlah_rekomendasi'))->with('risk')->get();
        $dataR = [];
        $labelsR = [];
        $activePage = 'dashboard';

        foreach ($assessments as $assessment) {
            $data[] = $assessment->count();
            $labels[] = $assessment->riskValue->nilai_risiko;
        }

        foreach ($monitorings as $monitoring) {
            $deptName = Department::find($monitoring->department);
            $dataM[] = $monitoring->jumlah_monitoring;
            $labelsM[] = $deptName->nama_department;
        }

        foreach ($recommendations as $recommendation) {
            $dataR[] = $recommendation->jumlah_rekomendasi;
            $labelsR[] = $recommendation->risk->nama_risiko;
        }
        

        return view('dashboard.dashboard', compact('data', 'labels', 'dataM', 'labelsM', 'dataR', 'labelsR', 'activePage'));
    }
}
