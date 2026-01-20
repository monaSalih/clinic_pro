<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
       public function index()
    {
        $doctors = Doctor::with('user')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $users = User::where('role', 'doctor')->get();
        return view('admin.doctors.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'specialization'=>'required',
            'user_id'=>'required|exists:users,id',
            'start_date'=>'required|date',
            'end_date'=>'nullable|date'
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success','Doctor added successfully');
    }
public function edit(Doctor $doctor)
{
    return view('admin.doctors.edit', compact('doctor'));
}
    public function update(Request $request, Doctor $doctor)
{
    $request->validate([
        'specialization' => 'required',
        'start_date' => '|date',
        'end_date' => 'nullable|date'
    ]);

    $doctor->update([
        'specialization' => $request->specialization,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
    ]);

    return redirect()->route('admin.doctors.index')
                     ->with('success','Doctor updated successfully');
}

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success','Doctor deleted successfully');
    }
}
