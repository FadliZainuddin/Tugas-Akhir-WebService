@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">{{ $post->nama_laptop }}</h2>
            <p>By: <a href="/shop?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a> in <a href="/shop?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <h5>{{ $post->excerp }}</h5>
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
            <a href="/shop" class="text-decoration-none">Back To Shop</a>
        </div>
    </div>
</div>
@endsection