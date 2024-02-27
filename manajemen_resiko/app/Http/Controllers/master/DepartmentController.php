<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show(){
        $department = Department::all();
        $activePage = 'department';
        return view('master.department_list', ['activePage' => $activePage,'departments' => $department]);
    }
    public function add(){
        $activePage = 'department';

        return view('master.department_add', ['activePage' => $activePage,]);
    }
    public function store(Request $request){
        try {
            $request->validate([
                'nama_department' => 'required|string|max:255',
                'deskripsi' => 'required|string|max:255',
            ]);

            $department = Department::create([
                'nama_department' => $request->input('nama_department'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            return redirect()->route('department.show')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $department = Department::find($id);
        $activePage = 'department';

        if (!$department) {
            abort(404); // Tampilkan halaman 404 jika data tidak ditemukan
        }
        return view('master.department_edit', ['activePage' => $activePage,'department' => $department]);
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->delete();
            return redirect()->route('department.show')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect()->route('department.show')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
                $request->validate([
                    'nama_department' => 'required|string|max:255',
                    'deskripsi' => 'required|string|max:255',

                ]);

            $depart = Department::find($id);
            if ($depart) {
                $depart->update([
                    'nama_department' => $request->input('nama_department'),
                    'deskripsi' => $request->input('deskripsi'),

                ]);

                return redirect()->route('department.show')->with('success', 'Data berhasil diperbarui!');
            } else {
                return redirect()->route('department.show')->with('error', 'Data tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return redirect()->route('department.show')->with('error', $e->getMessage());
        }
    }
}
