@extends('layouts.app')

@section('content')


@foreach ($data as $user)
<a class="showcmt" href="{{ url('userdetail/' . $user->id) }}"> show detail</a>
@foreach ($user->comments as $comment )

<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">content</th>


        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $comment->content }}</td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

@endsection
