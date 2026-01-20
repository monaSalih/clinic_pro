@extends('layouts.dashboard')

@section('title', 'Edit Doctor')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Doctor</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name (disabled) --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" 
                   value="{{ $doctor->user->name ?? 'N/A' }}" disabled>
        </div>

        {{-- Specialization --}}
        <div class="mb-3">
            <label class="form-label">Specialization</label>
            <select name="specialization" class="form-select" required>
                @php
                    $specializations = [
                        'Public Health','Sports Medicine','Physical therapy',
                        'general dentist','Surgery','Internal medicine',
                        'Pediatrics','Emergency medicine'
                    ];
                @endphp
                @foreach($specializations as $spec)
                    <option value="{{ $spec }}" {{ $doctor->specialization == $spec ? 'selected' : '' }}>
                        {{ $spec }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Start Date (disabled) --}}
        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $doctor->start_date ?? '' }}" disabled>
        </div>

        {{-- End Date --}}
        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $doctor->end_date ?? '' }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
