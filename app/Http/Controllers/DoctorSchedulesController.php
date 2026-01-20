<?php

namespace App\Http\Controllers;

use App\Models\doctor_schedules;
use Illuminate\Http\Request;

class DoctorSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        // eager load: doctor → user to get doctor name
        $schedules = doctor_schedules::with('doctor.user')->get();

        return view('admin.schedules.index', compact('schedules'));
    }
    public function view_home()
    {
    return view('user.home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(doctor_schedules $doctor_schedules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(doctor_schedules $doctor_schedules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, doctor_schedules $doctor_schedules)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(doctor_schedules $doctor_schedules)
    {
        //
    }
}
