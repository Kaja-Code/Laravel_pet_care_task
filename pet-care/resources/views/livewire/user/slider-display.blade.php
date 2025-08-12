<style>
    .slider-image-container {
      height: 150vh; /* Adjust this value as needed */
      min-height: 400px; /* Minimum height for smaller screens */
      max-height: 800px; /* Maximum height for larger screens */
      width: 100%;
      overflow: hidden;
    }

    @media (max-width: 768px) {
      .slider-image-container {
        height: 50vh;
        min-height: 300px;
      }
    }
  </style>
</head>
<body>

  <div wire:poll.5s id="petSlider" class="carousel slide pb-0 pt-0" data-bs-ride="carousel">
    <div class="carousel-inner">
      @forelse ($sliders as $index => $slider)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
          <div class="slider-image-container">
            <img 
              src="{{ asset('storage/' . $slider->image) }}" 
              class="d-block w-100 h-100 object-fit-cover" 
              alt="{{ $slider->title ?? 'Slider Image' }}"
              loading="lazy"
            >
          </div>
          <div class="carousel-caption d-none d-md-block">
            <h5 class="display-6 fw-bold">{{ $slider->title }}</h5>
            <p class="lead">{{ $slider->subtitle }}</p>
          </div>
        </div>
      @empty
        <div class="carousel-item active">
          <div class="slider-image-container bg-secondary d-flex align-items-center justify-content-center">
            <h3 class="text-white">No sliders available</h3>
          </div>
        </div>
      @endforelse
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#petSlider" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#petSlider" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@push('scripts')
<script>
document.addEventListener('livewire:load', function () {
  // Re-initialize bootstrap carousel after Livewire updates
  Livewire.hook('message.processed', (message, component) => {
    try {
      const sliderEl = document.getElementById('petSlider');
      if (!sliderEl) return;

      // If a Carousel instance exists, dispose it first then create new one to reset active state
      if (bootstrap && bootstrap.Carousel) {
        const instance = bootstrap.Carousel.getInstance(sliderEl);
        if (instance) {
          instance.dispose();
        }
        new bootstrap.Carousel(sliderEl, {
          interval: 3000,
          ride: 'carousel'
        });
      }
    } catch (e) {
      // ignore errors in environments without bootstrap defined
      // console.log(e)
    }
  });
});
</script>
@endpush