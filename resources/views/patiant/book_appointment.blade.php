@extends('patiant.patiant_view')

@section('title', 'Book Appointment')

@section('content')

<div class="container mt-4">

    <!-- Filter Section -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">🔎 Filter by Specialization</h4>

            <select id="specializationFilter" class="form-select">
                <option value="">All Specializations</option>
                <option>Public Health</option>
                <option>Sports Medicine</option>
                <option>Physical therapy</option>
                <option>general dentist</option>
                <option>Surgery</option>
                <option>Internal medicine</option>
                <option>Pediatrics</option>
                <option>Emergency medicine</option>
            </select>
        </div>
    </div>

    <!-- Doctor Cards -->
    <div class="row" id="doctorCards">

        @foreach($doctors as $doc)
        <div class="col-md-4 mb-4 doctor-card" data-spec="{{ $doc->specialization }}">

            <div class="card h-100 shadow-lg border-0">

                <!-- Doctor Image -->
                <img 
                    src="{{ $doc->image ?? 'https://via.placeholder.com/300x230?text=Doctor' }}" 
                    class="card-img-top"
                    style="height:230px; object-fit:cover;"
                >

                <div class="card-body">

                    <!-- Doctor Name -->
                    <h5 class="card-title">
                        {{ $doc->user->name ?? 'Unknown Doctor' }}
                    </h5>

                    <p class="text-muted">{{ $doc->specialization }}</p>

                    <!-- AVAILABLE schedules only -->
                    @php
                        $availableSchedules = $doc->schedules->where('is_booked', 0);
                    @endphp

                    @if($availableSchedules->count() > 0)

                        <h6 class="fw-bold mt-3">Available Appointments:</h6>

                        @foreach($availableSchedules as $schedule)
                            <div class="border rounded p-2 mb-2">
                                <p class="mb-1"><strong>📅 Date:</strong> {{ $schedule->available_date }}</p>
                                <p class="mb-1"><strong>⏰ Time:</strong> {{ $schedule->available_time }}</p>

                                <button 
                                    class="btn btn-primary btn-sm w-100"
                                    @if($schedule->is_booked) disabled @endif
                                >
                                    {{ $schedule->is_booked ? 'Booked' : 'Book Appointment' }}
                                </button>
                            </div>
                        @endforeach

                    @else
                        <p class="text-danger fw-bold">No available appointments</p>
                    @endif

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

<!-- Filter Script -->
<script>
document.getElementById("specializationFilter").addEventListener("change", function () {
    let selected = this.value.toLowerCase();
    let cards = document.querySelectorAll(".doctor-card");

    cards.forEach(card => {
        let spec = card.getAttribute("data-spec").toLowerCase();
        card.style.display = (selected === "" || spec === selected) ? "block" : "none";
    });
});
</script>

@endsection
