@extends('layouts.app')
@section('hello')
@section('title')
    show
@endsection
<div class="cards" style="width:80%; margin:auto; margin-top:50px;">
    <div class="card" style="margin: 40px 0">
        <div class="card-header">
          post info
        </div>
        <div class="card-body">
          <h5 class="card-title">title:{{$post->title}}</h5>
          <p class="card-text">{{$post->description}}</p>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          post creator info
        </div>
        <div class="card-body">
          <h5 class="card-title">name: {{ $post->user?  $post->user->name : 'not found'}}</h5>
          <p class="card-text">email: {{$post->user? $post->user->email : 'not found'}}</p>
          <p class="card-text">created at: {{$post->user? $post->created_at : 'not found'}}</p>
        </div>
      </div>
</div>
    
@endsection