@extends('layouts.master')

@section('title')
New Thread
@endsection

@section('content')
<form action="/thread" method="post">
    @csrf
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" value="{{$thread_title}}" class="form-control">
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
      <label>Content</label>
      <textarea name="content" class="form-control" rows="10"></textarea>
    </div>
    @error('content')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
      <label>Categories</label>
      {{-- <input type="" name="category" class="form-control"> --}}
      <select class="form-control" name="category">
        @forelse ($category as $key => $item)
          <option value="{{ $item->nama }}">{{ $item->nama }}</option>
        @empty
          <option value=""> --- </option>
        @endforelse
      </select>
    </div>
    @error('category')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
