@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div style="margin-top: 40px">
            <form action="{{ route('web.search')}}" method="GET">
                <div>
                    <label for=""> Enter key</label>
                    <input type="text" class="form-control" name="query" placeholder="Search ...." />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary"> Search</button>
                </div>
            </form>
        </div>
    </div>
</div>



@if (isset($data))


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
            <th scope="col">sum post</th>
            <th scope="col">sum comment</th>

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
                <td><a class="showpost" href="{{ url('showpost/' . $user->id) }}"> {{ $user->name }}</a></td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->birthday }}</td>


                <td>
                    <img src="{{ url('public/image/' . $user->avatar) }}" style="height: 100px; width: 150px;">
                </td>



                <td>{{ $user->email }}</td>

                <td><a class="showcmt"
                        href="{{ url('showcmt/' . $user->id) }}">{{ count($user->comments) }}</a></td>
                <td><a class="showpost"
                        href="{{ url('showpost/' . $user->id) }}">{{ count($user->posts) }}</a></td>


                <td>
                    {{-- <a class="edit" href="{{ url('edituser/' . $user->id) }}"> Edit </a>| --}}
                    <a class="showcmt" href="{{ url('showcmt/' . $user->id) }}"> show comment</a>|
                    <a class="showcmt" href="{{ url('showall/' . $user->id) }}"> show detail</a>|

                    <a class="delete" href="{{ 'deleteuser/' . $user->id }}"> Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$data->links('layouts.paginationlinks')}}
@endif


@endsection
