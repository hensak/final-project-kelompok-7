@extends('layouts.master')

@section('title')
Profile Page
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="card mx-3" style="width: 28rem;">
        <div class="card-body">
          <p class="card-title h3"> {{ $profile->user->username }} </p>
          <p class="card-text">
            <div> Email : </div>
            <div> {{ $profile->email }} </div>
          </p>
          <p class="card-text">
            <div> Biodata : </div>
            <div> {{ $profile->bio == null ? 'Belum ada.' : $profile->bio }} </div>
          </p>
          <p class="card-text">
            <div> Umur : </div>
            <div> {{ $profile->umur }} </div>
          </p>
          <p class="card-text">
            <div> Alamat : </div>
            <div> {{ $profile->alamat }} </div>
          </p>
          <a href="/profile/{{ $profile->id }}/edit" class="card-link float-right"> Edit Profile </a>
        </div>
      </div>
    </div>
  </div>
@endsection
