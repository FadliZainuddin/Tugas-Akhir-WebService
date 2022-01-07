@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Shops</h1>
    </div>
    @if (session('success'))
    <div class="alert alert-success col-lg-8" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive col-lg-8">
      <a href="/dashboard/post/create" class="btn btn-primary mb-3">Create New Shop</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama_laptop }}</td>
              <td>{{ $item->category->name }}</td>
              <td>
                  <a href="/dashboard/post/{{ $item->slug }}" class="badge bg-dark"><span data-feather="eye"></span></a>
                  <a href="/dashboard/post/{{ $item->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                  <form action="/dashboard/post/{{ $item->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="trash"></span></button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection