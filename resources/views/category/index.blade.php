@extends('layouts.master')

@section('title')
Category Page
@endsection

@section('content')
  <div class="container-fluid">
    <form action="/category" method="post">
        @csrf
        <div class="form-group">
          <label>Add Category</label>
          <input type="text" class="form-control" name="category_name" placeholder="ex: Horror, Comedy, Action, etc..">
        </div>
        @error('category_name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <div>
          <button type="submit" class="btn btn-primary" {{ isset($showEdit) ? 'disabled' : null }}> Add to List </button>
        </div>
    </form>
    <hr>
    @isset($showEdit)
      <form action="/category/{{ $categoryEdit->id }}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
            <label>Edit Category</label>
            <input type="text" class="form-control" name="category_name" value="{{ $categoryEdit->nama }}" placeholder="ex: Horror, Comedy, Action, etc..">
          </div>
          @error('category_name')
          <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div>
            <button type="submit" class="btn btn-primary"> Save </button>
          </div>
      </form>
    @endisset
  </div>
<hr/>

<div class="container-fluid">
  <label>Category List</label>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($category as $key => $item)
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $item->nama }}</td>
            <td>
              <a href="/category/{{ $item->id }}/edit" class="btn btn-info {{ isset($showEdit) ? 'disabled' : null }}"> Edit </a>
              <form class="d-inline" action="/category/{{ $item->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" {{ isset($showEdit) ? 'disabled' : null }}> Delete </button>
              </form>
            </td>
          </tr>
      @empty
        <p>No thread posted yet.</p>
      @endforelse
      </tbody>
  </table>
</div>
@endsection
