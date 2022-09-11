@extends('layouts.master')

@section('title')
Homepage
@endsection

@section('content')
  <div class="container-fluid">
    <form action="/thread/create" method="post">
      @csrf
      <div class="form-group">
        <label>Create Thread</label>
        @auth
        <textarea name="thread_title" class="form-control" placeholder="Put your title here..." rows="3"></textarea>
        @endauth
        @guest
        <textarea name="thread_title" class="form-control" placeholder="Sign in before create new thread." rows="3"></textarea>
        @endguest
      </div>
      @error('thread_title')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <div>
        {{-- <a href="/thread/create" class="btn btn-primary">Create thread</a> --}}
        @auth
        <button type="submit" class="btn btn-primary">Continue</button>
        @endauth
        @guest
        <button type="submit" class="btn btn-primary" disabled>Continue</button>
        @endguest
      </div>
    </form>
  </div>
<hr/>

<div class="container-fluid">
  <label>Thread List</label>
  @forelse ($thread as $key => $item)
    <div class="card">
      <div class="card-header">{{$item->user->username}}</div>
      <div class="card-body">
        <h5 class="card-title h3">{{$item->title}}</h5>
        <p class="card-text">{{$item->content}}</p>
        {{-- <div class="container-fluid"> --}}
          <div class="row d-flex justify-content-end w-100">
            <div class="col-md-4">
              <a href="#" class="btn btn-primary">Answer</a>
            </div>
            <div class="col-md-3">Category: {{ $item->category->nama }}</div>
            <div class="col-md-4">Posted at: {{$item->date}}</div>
            <div class="col-md-1">Like 5</div>
          {{-- </div> --}}
        </div>

      </div>
    </div>
@empty
  <p>No thread posted yet.</p>
@endforelse
</div>
@endsection
