<!-- resources/views/admin/adminDashboard.blade.php -->
@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
  <h2 class="mb-4">Admin Dashboard</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Manage Sliders</h5>
          <p class="card-text">Add, edit, or delete homepage sliders.</p>
          <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary">Go to Sliders</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">View Users</h5>
          <p class="card-text">Manage registered users.</p>
          <a href="#" class="btn btn-secondary">Coming Soon</a>
        </div>
      </div>
    </div>
  </div>
@endsection
