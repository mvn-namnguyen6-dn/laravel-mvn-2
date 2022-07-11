@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Add user </h1>
    @if (Session::has('success'))
        <div class="success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form method="post" action="{{ url('savepost') }}">
        @csrf
        Title:<br>
        <input type="text" name="title" value=""><br>
        content:<br>
        <textarea type="text" name="content" value=""></textarea><br>

        <input type="submit" value="Submit">
        <a class="back" href="{{ url('showpost') }}"> back </a>
    </form>
</div>
@endsection
