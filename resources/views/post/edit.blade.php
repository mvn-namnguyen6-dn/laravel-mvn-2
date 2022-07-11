@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Edit Post </h1>
        @if (Session::has('success'))
    <div class="success">
        {{Session::get('success')}}
    </div>

    @endif
    <form method="post" action="{{url('updatepost/')}}">
            @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        Title:<br>
        <input type="text" name="title" value="{{$data->title}}"><br>
        Content:
        <br>
        <textarea type="text" name="content" value="{{$data->content}}"> {{$data->content}}</textarea><br>
        <input type="submit" value="Submit">
        <a class="back" href="{{ url('showpost') }}"> back </a>
    </form>
    </div>
@endsection
