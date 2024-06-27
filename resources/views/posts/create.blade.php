@extends('layouts.app')
@section('hello')

<form style="width: 80%; margin:auto;" method="post" action="{{route('posts.store')}}">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
  @csrf
    <fieldset >
      <legend>create post</legend>
      <div class="mb-3">
        <label for="disabledTextInput" class="form-label">title</label>
        <input type="text" id="disabledTextInput" class="form-control" name="title" placeholder="title">
      </div>
      <div class="mb-3">
        <label for="discription" class="form-label">discription</label>
        <textarea name="description" id="discription" class="form-control" name="discription" role="3"></textarea>
      </div> 
      <div class="mb-3">
        <label for="disabledSelect" class="form-label">post creator</label>
        <select id="disabledSelect" name="creator" class="form-select">
          @foreach ($users as $user)
              <option  value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
          
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
  </form>
@endsection