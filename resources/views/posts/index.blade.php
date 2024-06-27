@extends('layouts.app')
@section('hello')
@section('title')
    index
@endsection
<div style="margin:20px;">
    <div style="margin-left:50%;">
      <a href="{{route('posts.create')}}" class="btn btn-success">creat post</a>
    
    </div>
</div>
<table class="table" style="width: 80%; margin:auto;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">created at</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user? $post->user->name : 'user not found'}}</td>
      <td>{{$post->created_at}}</td>
      <td>
        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">view</a>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">edit</a>
        <form style="display: inline;" action="{{ route('posts.destroy', $post->id) }}" method="post">
          @csrf
          @method('DELETE')
           <button onclick="confirm('do you want to delete this post')" type="submit" class="btn btn-danger">delete</button>
        </form>
        
      </td>
    </tr>
    @endforeach
   
  </tbody>
</table>
@endsection