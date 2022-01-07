@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post->nama_laptop }}</h2>
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            <article class="my-3 fs-5">
                {!! $post->body !!}
                <a href="/dashboard/post" class="btn btn-success mt-3"><span data-feather="arrow-left"></span> Back To Shop</a>
                <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning mt-3"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mt-3" onclick="return confirm('Are You Sure?')"><span data-feather="trash"></span> Delete</button>
                </form>
            </article>
        </div>
    </div>
</div>
@endsection