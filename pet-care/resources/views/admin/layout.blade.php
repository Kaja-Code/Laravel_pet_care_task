<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Admin Panel')</title>

  <!-- Bootstrap (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Livewire styles -->
  @livewireStyles

  @stack('styles')
</head>
<body>

  <!-- Shared Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="adminNavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/sliders*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}">Sliders</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container py-4">
    {{-- If Livewire component rendered with ->layout(), $slot will be present. Safely render it if set. --}}
    @isset($slot)
      {{ $slot }}
    @endisset

    {{-- Normal Blade children (when using @extends / @section) --}}
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Livewire scripts -->
  @livewireScripts

  @stack('scripts')
</body>
</html>
