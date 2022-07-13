@extends('layouts.app')

@section('content')

<div class=".container-md" style="margin: 50px 10% ;">
    @if (Session::has('success'))
    <div class="success">

        {{Session::get('success')}}
    </div>
    @endif
    <div>
        <a class="add" href="{{ url('adduser') }}">add</a>
    </div>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">user id</th>
                <th scope="col">username</th>
                <th scope="col">age</th>
                <th scope="col">birthday</th>
                <th scope="col">avatar</th>
                <th scope="col">email</th>
                <th scope="col"> action </th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $user)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->id }}</td>
                    <td><a class="showpost" href="{{ url('showpost/' . $user->id) }}" > {{ $user->name }}</a></td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->avatar }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                         {{-- <a class="edit" href="{{ url('edituser/' . $user->id) }}"> Edit </a>| --}}
                        <a class="showcmt" href="{{ url('showcmt/' . $user->id) }}"> show comment</a>|
                        <a class="showcmt" href="{{ url('showall/' . $user->id) }}"> show detail</a>|

                        <a class="delete" href="{{ 'deleteuser/' . $user->id }}"> Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
