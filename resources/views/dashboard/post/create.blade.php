@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Shops</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/dashboard/post" class="mb-5">
        @csrf
        <div class="mb-3">
          <label for="nama_laptop" class="form-label">Nama Barang</label>
          <input type="text" class="form-control @error ('nama_laptop') is-invalid @enderror" id="nama_laptop" name="nama_laptop" placeholder="Nama Barang" required autofocus value="{{ old('nama_laptop') }}">
          @error('nama_laptop')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error ('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Slug" required value="{{ old('slug') }}">
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="category" class="form-label @error ('category_id') is-invalid @enderror">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else 
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          @error('body')
            <p class="text-danger">
              {{ $message }}
            </p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create Shop</button>
    </form>
</div>
<script>
  const nama_laptop = document.querySelector('#nama_laptop');
  const slug = document.querySelector('#slug');
  nama_laptop.addEventListener('change', function(){
      fetch('/dashboard/post/checkSlug?nama_laptop='+nama_laptop.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection