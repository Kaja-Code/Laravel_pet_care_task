<section class="py-5 ">
  <div class="container  ">
    <div class="row justify-content-center">
      <!-- Wider form container -->
      <div class="col-12 col-lg-11 col-xl-12">
        <div class="bg-white bg-opacity-50 p-3 p-md-4 rounded-3 shadow">
          <h2 class="text-center mb-4 display-6 fw-bold">Get an Appointment</h2>
          
          <form action="#" method="POST">
            @csrf

            <!-- Personal Info -->
            <div class="row g-3 mb-3">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 ">
                <input type="text" class="form-control form-control-lg" name="first_name" placeholder="First Name" required>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <input type="text" class="form-control form-control-lg" name="last_name" placeholder="Last Name" required>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <input type="tel" class="form-control form-control-lg" name="phone" placeholder="Phone" required>
              </div>
            </div>

            <!-- Pet & Services -->
            <div class="row g-3 mb-3">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <select class="form-select form-select-lg" name="pet_category" required>
                  <option value="" selected disabled>Pet Category</option>
                  <option>Dog</option>
                  <option>Cat</option>
                  <option>Bird</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <select class="form-select form-select-lg" name="service1" required>
                  <option value="" selected disabled>Service 1</option>
                  <option>Grooming</option>
                  <option>Vet Checkup</option>
                  <option>Vaccination</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <select class="form-select form-select-lg" name="service2">
                  <option value="" selected disabled>Service 2</option>
                  <option>Training</option>
                  <option>Boarding</option>
                  <option>Walking</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <select class="form-select form-select-lg" name="service3">
                  <option value="" selected disabled>Service 3</option>
                  <option>Bathing</option>
                  <option>Dental Care</option>
                  <option>Microchipping</option>
                </select>
              </div>
            </div>

            <!-- Message -->
            <div class="mb-4">
              <textarea class="form-control form-control-lg" name="message" rows="4" placeholder="Enter your message here..." required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-lg px-4 py-3">
                <i class="bi bi-calendar-check me-2"></i>Book Appointment
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
