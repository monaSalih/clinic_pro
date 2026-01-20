@extends('layouts.dashboard')

@section('title', 'Doctor Schedules')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Doctor Schedules</h2>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Doctor Name</th>
                <th>Available Date</th>
                <th>Available Time</th>
                <th>Booked</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    {{-- Doctor Name --}}
                    <td>{{ $schedule->doctor->user->name ?? 'N/A' }}</td>

                    <td>{{ $schedule->available_date }}</td>
                    <td>{{ $schedule->available_time }}</td>

                    <td>
                        @if($schedule->is_booked)
                            <span class="badge bg-danger">Booked</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
