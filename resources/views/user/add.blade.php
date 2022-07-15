@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <h1> Add user </h1>
        @if (Session::has('success'))
            <div class="success">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="post" action="{{ url('saveuser') }}"   enctype="multipart/form-data">
            @csrf
            Name:<br>
            <input type="text" name="name" value=""><br>
            Email:<br>
            <input type="email" name="email" value=""><br>
            Password:<br>
            <input type="password" name="password" value=""><br>
            Age:<br>
            <input type="text" name="age" value=""><br>
            birthday:<br>
            <input type="date" name="birthday" value=""><br>
            Avatar:
            <input type="file" name="avatar" value="">
            <br>
            <input type="submit" value="Submit">
            <a class="back" href="{{ url('showuser') }}"> back </a>
        </form>
    </div>
</body>




@endsection
