<!-- resources/views/include/header.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <!-- Brand Logo with Animation -->
    <a class="navbar-brand fw-bold fs-4" href="#" style="transition: all 0.3s ease;">
      <span class="me-2">🐾</span>Pet Care
    </a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler border-0" type="button" 
            data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-3 mb-lg-0">
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">Home</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">About Us</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">Services</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">Shop</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
        <li class="nav-item dropdown px-2">
          <a class="nav-link position-relative py-3 dropdown-toggle" href="#" id="pagesDropdown" 
             data-bs-toggle="dropdown" aria-expanded="false">
            <span class="nav-link-text">Pages</span>
            <span class="nav-link-underline"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
            <li><a class="dropdown-item" href="#">Our Team</a></li>
            <li><a class="dropdown-item" href="#">Pricing</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Testimonials</a></li>
          </ul>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">Blog</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link position-relative py-3" href="#">
            <span class="nav-link-text">Contact</span>
            <span class="nav-link-underline"></span>
          </a>
        </li>
      </ul>
      
      <!-- Appointment Button -->
      <div class="d-flex ms-lg-3">
        <a href="#formSection" class="btn btn-primary px-4 py-2 fw-medium btn-hover-effect">
          <i class="bi bi-calendar-check me-2"></i>Get Appointment
        </a>
      </div>
    </div>
  </div>
</nav>

<style>
  /* Navbar Hover Effects */
  .navbar-brand:hover {
    transform: scale(1.05);
  }
  
  .nav-link {
    color: #333 !important;
    transition: all 0.3s ease;
  }
  
  .nav-link:hover, .nav-link:focus {
    color: #0d6efd !important;
  }
  
  .nav-link.active {
    color: #0d6efd !important;
    font-weight: 500;
  }
  
  /* Animated Underline Effect */
  .nav-link-underline {
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #0d6efd;
    transition: width 0.3s ease;
  }
  
  .nav-link:hover .nav-link-underline,
  .nav-link.active .nav-link-underline {
    width: 100%;
  }
  
  /* Button Hover Effect */
  .btn-hover-effect {
    transition: all 0.3s ease;
  }
  
  .btn-hover-effect:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
  }
  
  /* Dropdown Menu Styling */
  .dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
  
  .dropdown-item {
    padding: 0.5rem 1.5rem;
    transition: all 0.2s ease;
  }
  
  .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #0d6efd !important;
  }
  
  /* Mobile Menu Styling */
  @media (max-width: 991.98px) {
    .navbar-collapse {
      background-color: white;
      padding: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      margin-top: 0.5rem;
    }
    
    .nav-item {
      margin-bottom: 0.5rem;
    }
    
    .nav-link {
      padding: 0.75rem 1rem !important;
    }
    
    .nav-link-underline {
      bottom: 10px;
    }
    
    .btn-hover-effect {
      width: 100%;
      margin-top: 1rem;
    }
  }
  
  /* Toggle Button Animation */
  .navbar-toggler {
    transition: all 0.3s ease;
  }
  
  .navbar-toggler:focus {
    box-shadow: none;
  }
  
  .navbar-toggler[aria-expanded="true"] {
    transform: rotate(90deg);
  }
</style>