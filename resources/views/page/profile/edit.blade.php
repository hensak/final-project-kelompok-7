@extends('layouts.master')

@section('title')
Edit Profile Page
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <form action="/profile/{{ $profile->id }}" method="post">
          @csrf
          @method('put')
          <div class="card mx-3" style="width: 28rem;">
            <div class="card-body">
              <p class="card-title h3"> {{ $profile->user->username }} </p>
              <p class="card-text">
                <div> Email : </div>
                <div> <input type="text" class="form-control" name="email" value="{{ $profile->email }}"> </div>
              </p>
              <p class="card-text">
                <div> Biodata : </div>
                <div> <input type="text" class="form-control" name="bio" value="{{ $profile->bio == null ? 'Belum ada.' : $profile->bio }}"> </div>
              </p>
              <p class="card-text">
                <div> Umur : </div>
                <div> <input type="text" class="form-control" name="umur" value="{{ $profile->umur }}"> </div>
              </p>
              <p class="card-text">
                <div> Alamat : </div>
                <div> <input type="text" class="form-control" name="alamat" value="{{ $profile->alamat }}"> </div>
              </p>
              <button type="submit" class="btn btn-success"> Simpan </button>
            </div>
          </div>

      </form>
    </div>
  </div>
@endsection
