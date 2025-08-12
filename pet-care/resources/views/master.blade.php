<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pet Care Website</title>
    @livewireStyles
<style>
  body {
    overflow-x: hidden;
  } 
</style>
  <!-- Bootstrap Icons & CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
  @include('include.header')

  <!-- Main Content -->
  <main class="flex-grow-1">

    <!-- Slider Section -->
    <div >
      @livewire('user.slider-display')
    </div>

    <!-- What We Do Section -->
    <section class="py-4 pb-0 pt-0 bg-light">
      <div >
        @include('.whatwedo')
      </div>
    </section>

    <!-- Appointment Form Section -->
<section class="py-4 pb-0 pt-0" style="background: url('images/petbg1.jpeg') center center / cover no-repeat;">
  <div >
    <div class="row justify-content-center ">
      <div class="col-12 col-md-10 col-lg-8">
        @include('.form')
      </div>
    </div>
  </div>
</section>


  </main>

  <!-- Footer -->
  @include('include.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @livewireScripts

</body>
</html>
