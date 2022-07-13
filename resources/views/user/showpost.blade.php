

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
        @foreach ($data as $user)

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->content }}</td>

            </tr>

        @endforeach
    </tbody>
</table>


