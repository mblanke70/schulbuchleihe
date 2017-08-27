@extends ('layout')
        
@section ('content')

<div class="container">
    <h1>Bücherlisten</h1>
</div>

<div class="container">
    <a class="btn btn-success" href="{{ url('buchlisten/create') }}">Neuer Bücherliste</a>
</div>

<hr />

<div class="container">

    <table class="table">

        <thead>

            <tr>
                <th>ID</th>
                <th>Jahrgang</th>
                <th>Schuljahr</th>
                <th>Aktion</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($buchlisten as $l)
            
                <tr>
                    <td>{{ $l->id }}</td>
                    <td>{{ $l->jahrgang }}</td>
                    <td>{{ $l->schuljahr }}</td>
                    <td><a href="{{ url('buchlisten/'.$l->id) }}"> Anzeigen </a></td>

                    <!-- Buchliste Delete Button -->
                    <td>
                        <form action="{{ url('buchlisten/'.$l->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection