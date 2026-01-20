@extends('layouts.dashboard')

@section('title', 'Users')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Doctors</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>specialization</th>
                <th>start_date</th>
                <th>end_date</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{  $doctor->user->name ?? 'N/A' }}</td>
                <td>{{ ucfirst($doctor->specialization ?? 'Public Health') }}</td>
                <td>{{ $doctor->start_date ?? 'N/A' }}</td>
                <td>{{ $doctor->end_date ?? 'Present' }}</td>
                <td>
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection