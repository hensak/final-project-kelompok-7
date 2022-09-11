@extends('layouts.master')

@section('title')
Edit Thread
@endsection

@section('content')
<form action="/myThread/{{ $mythread->id }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" value="{{$mythread->title}}" class="form-control">
    </div>
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
      <label>Content</label>
      <textarea name="content" class="form-control" rows="10">{{ $mythread->content }}</textarea>
    </div>
    @error('content')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
      <label>Categories</label>
      {{-- <input type="" name="category" class="form-control"> --}}
      <select class="form-control" name="category">
        <option selected>{{$mythread->category->nama}}</option>
        @forelse ($category as $key => $item)
          @if ($item->nama == $mythread->category->nama)
            @continue
          @endif
          <option value="{{ $item->nama }}">{{ $item->nama }}</option>
        @empty
          <option value=""> --- </option>
        @endforelse
      </select>
    </div>
    @error('category')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
@endsection
