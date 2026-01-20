@extends('layouts.user')

@section('title', 'Home')

@section('content')
<style>
    .hero {
        background: url('https://png.pngtree.com/thumb_back/fh260/background/20240522/pngtree-abstract-blur-hospital-clinic-medical-interior-background-image_15683664.jpg') center/cover no-repeat;
        height: 380px;
        border-radius: 12px;
        position: relative;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        padding: 20px;
    }

    .service-card img {
        height: 180px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .service-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.1);
    }
</style>

<div class="container py-4">

    {{-- Hero Section --}}
    <div class="hero mb-5">
        <div class="hero-overlay">
            <div>
                <h1 class="fw-bold display-5">Welcome to Our Clinic</h1>
                <p class="lead">Trusted Healthcare Services for You and Your Family</p>
                <a href="{{ route('user.home') }}" class="btn btn-light mt-3 px-4 py-2">
                    View Doctors & Book Appointment
                </a>
            </div>
        </div>
    </div>

    {{-- Services Section --}}
    <h2 class="text-center fw-bold mb-4">Our Medical Services</h2>
    <div class="row g-4">

        {{-- Service 1 --}}
        <div class="col-md-4">
            <div class="card service-card h-100 shadow-sm">
                <img src="https://img.freepik.com/free-photo/empty-modern-medical-office-having-disease-documents-table-equipped-with-contemporary-furniture-hospital-workplace-with-nobody-it-ready-sickness-consultation-medicine-support_482257-35871.jpg" alt="General Consultation">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">General Consultation</h5>
                    <p class="text-muted">
                        Meet our certified doctors for essential health assessments and advice.
                    </p>
                </div>
            </div>
        </div>

        {{-- Service 2 --}}
        <div class="col-md-4">
            <div class="card service-card h-100 shadow-sm">
                <img src="https://as1.ftcdn.net/jpg/05/25/96/18/1000_F_525961867_S0g1ltUCIhSwmyLSM7YfnerJkCQaKzsb.jpg" alt="Specialized Treatments">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Specialized Treatments</h5>
                    <p class="text-muted">
                        Access expert care in cardiology, neurology, pediatrics, and more.
                    </p>
                </div>
            </div>
        </div>

        {{-- Service 3 --}}
        <div class="col-md-4">
            <div class="card service-card h-100 shadow-sm">
                <img src="https://media.istockphoto.com/id/1782848258/photo/teenager-at-a-medical-appointment.jpg?s=612x612&w=0&k=20&c=64NB_2mcmVQy0wkNVYfUAGWxb5Vse7Gj7GjYkMR4NKQ=" alt="Dental Care">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Dental & Physiotherapy</h5>
                    <p class="text-muted">
                        Providing professional dental care and physical therapy sessions.
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- About Section --}}
    <div class="mt-5 p-4 bg-light rounded shadow-sm">
        <h3 class="fw-bold mb-3">Why Choose Us?</h3>
        <ul class="text-muted">
            <li>✔ Highly experienced doctors</li>
            <li>✔ Modern equipment & advanced facilities</li>
            <li>✔ Fast appointments & online booking</li>
            <li>✔ Patient-centered care with compassion</li>
        </ul>
    </div>

</div>
@endsection
