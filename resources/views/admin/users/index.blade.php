@extends('layouts.dashboard')

@push('styles')
<style>
    h2 {
        letter-spacing: 0.5px;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa !important;
        transition: 0.2s;
    }

    .card {
        border-radius: 10px;
    }

    .btn {
        border-radius: 6px;
    }

    .badge {
        padding: 6px 10px;
        font-size: 0.85rem;
    }
</style>
@endpush

@section('content')
<div class="container py-4">

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Users</h2>
         <a href="{{ route('admin.users.create') }}" class="btn btn-primary shadow-sm px-4">
            + Add User
        </a>
    </div>

    {{-- User Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            <td>
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}" 
                                   class="btn btn-sm btn-warning me-1">
                                    Edit
                                </a>

                                {{-- Delete Form --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                      method="POST"
                                      class="d-inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Are you sure you want to delete this user?')" 
                                            class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>
@endsection
