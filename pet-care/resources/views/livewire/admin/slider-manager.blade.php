{{-- resources/views/livewire/admin/slider-manager.blade.php --}}

@push('styles')
<style>
  .slider-image-container {
    height: 120vh;       /* adjust as needed */
    min-height: 300px;
    max-height: 800px;
    width: 100%;
    overflow: hidden;
  }

  @media (max-width: 768px) {
    .slider-image-container {
      height: 40vh;
      min-height: 200px;
    }

  table.table thead {
    display: none; /* hide headers */
  }
  table.table, table.table tbody, table.table tr, table.table td {
    display: block;
    width: 100%;
  }
  table.table tr {
    margin-bottom: 1rem;
    border: 1px solid #ddd;
    padding: 0.5rem;
    border-radius: 8px;
    background: #fff;
  }
  table.table td {
    text-align: right;
    padding-left: 50%;
    position: relative;
  }
  table.table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 50%;
    padding-left: 1rem;
    font-weight: bold;
    text-align: left;
  }
}


  /* ensure image covers the container */
  .slider-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>
@endpush

<div>
  <!-- ====== Carousel Preview (admin preview of user slider) ====== -->
  <div class="mb-4">
    <h5 class="mb-3">Live Preview</h5>

    {{-- Use id so we can re-init after Livewire updates --}}
    <div id="petSlider" class="carousel slide" data-bs-ride="carousel" wire:ignore.self>
      <div class="carousel-inner">
        @forelse ($sliders as $index => $slider)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="slider-image-container">
              <img
                src="{{ asset('storage/' . $slider->image) }}"
                class="d-block"
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

      {{-- controls --}}
      <button class="carousel-control-prev" type="button" data-bs-target="#petSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#petSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

      {{-- indicators (optional) --}}
      @if($sliders->count() > 1)
        <div class="carousel-indicators mt-2">
          @foreach($sliders as $i => $s)
            <button type="button" data-bs-target="#petSlider" data-bs-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}" aria-current="{{ $i === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $i+1 }}"></button>
          @endforeach
        </div>
      @endif
    </div>
  </div>

  <!-- ====== Form: Add / Update Slider ====== -->
  <div class="card mb-4">
    <div class="card-body">
      @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" enctype="multipart/form-data">
        <div class="mb-2">
          <input type="text" wire:model="title" placeholder="Title" class="form-control" />
          @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-2">
          <input type="text" wire:model="subtitle" placeholder="Subtitle" class="form-control" />
          @error('subtitle') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <input type="file" wire:model="image" class="form-control" key="{{ $editMode ? 'edit' . $editSliderId : 'new' }}" />


          @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

          {{-- optional preview of the new upload --}}
          @if ($image && is_object($image))
            <div class="mt-2">
              <small>New image preview:</small>
              <div class="slider-image-container mt-1">
                <img src="{{ $image->temporaryUrl() }}" alt="Preview">
              </div>
            </div>
          @endif
        </div>

        <div wire:loading wire:target="image" class="alert alert-info">
    Uploading image, please wait...
</div>

    <button 
        type="submit" 
        class="btn btn-primary"  
 
        wire:loading.attr="disabled"
         wire:target="image"
        >
        {{ $editMode ? 'Update' : 'Add' }} Slider
    </button>
   
        @if($editMode || $title || $subtitle || $image)
          <button type="button" wire:click="resetForm" class="btn btn-secondary ms-2">Cancel</button>
        @endif
      </form>
    </div>
  </div>

  <!-- ====== Table: Existing Sliders ====== -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">All Sliders</h5>

      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr>
              <th style="width:120px">Image</th>
              <th>Title</th>
              <th>Subtitle</th>
              <th style="width:150px">Actions</th>
            </tr>
          </thead>
          <tbody>
  @forelse ($sliders as $slider)
    <tr>
      <td data-label="Image">
        <img src="{{ asset('storage/' . $slider->image) }}" width="110" style="object-fit:cover; height:70px" alt="{{ $slider->title }}">
      </td>
      <td data-label="Title">{{ $slider->title }}</td>
      <td data-label="Subtitle">{{ $slider->subtitle }}</td>
      <td data-label="Actions">
        <button wire:click="edit({{ $slider->id }})" class="btn btn-warning btn-sm">Edit</button>
        <button wire:click="delete({{ $slider->id }})" class="btn btn-danger btn-sm ms-1" onclick="confirm('Delete this slider?') || event.stopImmediatePropagation()">Delete</button>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4" class="text-center">No sliders found.</td>
    </tr>
  @endforelse
</tbody>

        </table>
      </div>
    </div>
  </div>
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
          interval: 5000,
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
