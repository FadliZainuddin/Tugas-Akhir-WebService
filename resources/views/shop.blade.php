@extends('layouts.main')
@section('container')
<article class="mb-5">
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/shop">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($post->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="{{ $post[0]->category->name }}">
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/shop/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->nama_laptop }}</a></h3>
            <p>
                <small class="text-muted">
                By: <a href="/shop?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }} </a> in <a href="/shop?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <a href="/shop/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            @foreach ($post->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-2 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                        <a href="/shop?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->nama_laptop }}</h5>
                        <p>
                            <small class="text-muted">
                            By: <a href="/shop?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a> {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/shop/{{ $post->slug }}" class="btn btn-primary">Read More....</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif
    
    
</article>
@endsection