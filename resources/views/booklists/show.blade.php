@extends ('layout')
        
@section ('content')

    <h1>Bücherliste</h1>
 

    <table class="table">

        <tr>
            <th>Jahrgang</th>
            <td> {{ $buchliste->jahrgang }} </td>
        </tr>
        <tr>
            <th>Schuljahr</th>
            <td> {{ $buchliste->schuljahr }} </td>
        </tr>

    </table>


    <form action="{{ url('buchlisten/') }}" method="POST">
    
        {{ csrf_field() }}

        <div class="form-group">
            <label for="buchtitel-titel">Neuer Buchtitel</label>

            <div>
                <select class="form-control" id="buchtitel-titel">
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>

            <a class="btn btn-success" href="{{ url('buchlisten/edit') }}">Hinzufügen</a>
        </div>

    </form>

    <hr />
    
    <table class="table">

        <tr>
            <th>ID</th>
            <th>Titel</th> 
            <th>Verlag</th>
            <th>Preis</th>
            <th>Kennung</th>
        </tr>

    @foreach ($buecher as $b)

        <tr>
            <td> {{ $b->id }} </td>
            <td> {{ $b->titel }} </td>
            <td> {{ $b->verlag }} </td>
            <td> {{ $b->preis }} </td>
            <td> {{ $b->kennung }} </td>
        </tr>

    @endforeach

    </table>

@endsection