@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div style="margin-top: 40px">
                <form action="{{ route('web.search')}}" method="GET">
                    <div>
                        <label for=""> Enter key</label>
                        <input type="text" class="form-control" name="query" placeholder="Search ...." />
                        <select>
                            <option value="0">name</option>
                            <option value="1">comment</option>
                            <option value="2">post</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"> Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>










    <div class=".container-md" style="margin: 50px 10% ;">
        @if (Session::has('success'))
            <div class="success">

                {{ Session::get('success') }}
            </div>
        @endif
        <div>
            <a class="btn btn-primary" href="{{ url('adduser') }}">add</a>
        </div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">user id</th>
                    {{-- <th scope="col">username</th> --}}
                    <th scope="col"><a href="?sort-by=name&sort-type={{$sortType}}">username</a></th>

                    {{-- <th scope="col">age</th> --}}
                    <th scope="col"><a href="?sort-by=age&sort-type={{$sortType}}">age</a></th>

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
            <div class="pagination-block">
             {{$data->links('')}}
            </div>
    </div>
@endsection
