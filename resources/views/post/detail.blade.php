@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> detail Post </h1>
        @if (Session::has('success'))
    <div class="success">
        {{Session::get('success')}}
    </div>

    @endif


        <input type="hidden" name="id" value="{{$data->id}}">

  <h3>{{$data->title}}</h3>
  <br>
      <h5>  Content:</h5>
        <br>
      {{$data->content}}<br>
        <a class="back" href="{{ url('showpost') }}"> back </a>

    </div>
@endsection
