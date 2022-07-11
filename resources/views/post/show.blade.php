@extends('layouts.app')

@section('content')


<div class=".container-md" style="margin: 50px 10% ;">
    @if (Session::has('success'))
    <div class="success">

        {{Session::get('success')}}
    </div>
    @endif
    <div>
        <a class="addpost" href="{{ url('addpost') }}">add</a>
    </div>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col"> action </th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $post)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        @can('update', $post)
                            <a class="edit" href="{{ url('editpost/' . $post->id) }}"> Edit </a>|
                        @endcan
                        @can('delete', $post)
                        <a class="delete" href="{{ 'deletepost/' . $post->id }}"> Delete</a>|
                        @endcan
                        <a class="detail" href="{{ 'detailpost/' . $post->id }}"> detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
