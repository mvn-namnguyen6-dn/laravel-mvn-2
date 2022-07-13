@extends('layouts.app')

@section('content')

<h1>Show user detail</h1>
@foreach ($data2 as $user)
<p>User ID : <?php echo $user->id ?></p>
<p>UserName : <?php echo $user->name ?></p>
<p>Email : <?php echo $user->email ?></p>

<p>Age : <?php echo $user->age ?></p>
<p>Birthday : <?php echo $user->birthday ?></p>

@endforeach
@foreach ($data3 as $user1 )
<p>Address : <?php echo $user1->address ?></p>
<p>Tel: <?php echo $user1->tel ?></p>
<p>Province : <?php echo $user1->province ?></p>
@endforeach


@endsection
