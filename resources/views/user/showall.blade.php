@extends('layouts.app')

@section('content')


<h1>Show user detail</h1>
@foreach ($data2 as $user)
<p>User ID : <?php echo $user->id ?></p>
<p>UserName : <?php echo $user->name ?></p>
<p>Age : <?php echo $user->age ?></p>
<p>Birthday : <?php echo $user->birthday ?></p>
@foreach ($data3 as $user1 )
<p>Address : <?php echo $user1->address ?></p>
<p>Tel: <?php echo $user1->tel ?></p>
<p>Province : <?php echo $user1->province ?></p>

@endforeach
@endforeach

<h2> Show comment </h2>


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
        @foreach ($data as $user)

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->content }}</td>
            </tr>

        @endforeach
    </tbody>
</table>



<h2> Show Post </h2>


<table class="table table-success table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>

            <th scope="col">content</th>


        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($data1 as $user)

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->content }}</td>

            </tr>

        @endforeach
    </tbody>
</table>









@endsection
