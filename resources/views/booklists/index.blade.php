@extends ('layout')
        
@section ('content')

<h1>Bücherlisten</h1>

<div class="container">

    <table class="table">

        <thead>

            <tr>
                <th>Jahrgang</th>
                <th>Schuljahr</th>
                <th>Aktion</th>
            </tr>

        </thead>

        <tbody>

            @foreach ($buchlisten as $l)
            
                <tr>
                    <td> {{ $l->jahrgang }} </td>
                    <td> {{ $l->schuljahr }} </td>
                    <td>
                        <a href="{{ url('buchlisten/'.$l->id) }}"> Anzeigen </a>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection