@extends ('layout')
        
@section ('content')

    <h1>Bücherliste</h1>
 

    <table class="table">

        <tr>
            <th>Jahrgang</th>
            <td>{{ $booklist->jahrgang }}</td>
        </tr>
        <tr>
            <th>Schuljahr</th>
            <td>{{ $booklist->schuljahr }}</td>
        </tr>

    </table>


    <form action="{{ url('buchlisten/attach', [$booklist->id]) }}" method="POST">
    
        {{ csrf_field() }}

        <div class="form-group">
            <label for="buchtitel-titel">Buchtitel hinzufügen</label>

            <div>
                <select name="bid" class="form-control" id="buchtitel-titel">
                
        @foreach ($booktitlesNotAttached as $bt)
            <option value="{{ $bt->id }}">{{ $bt->titel }}</option>
        @endforeach

                </select>
            </div>

            <button type="submit">Hinzufügen</button>
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

    @foreach ($booktitlesAttached as $bt)

        <tr>
            <td>{{ $bt->id }}</td>
            <td>{{ $bt->titel }}</td>
            <td>{{ $bt->verlag }}</td>
            <td>{{ $bt->preis }}</td>
            <td>{{ $bt->kennung }}</td>
            <td>
                <form action="{{ url('buchlisten/detach', [$booklist->id, $bt->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

    @endforeach

    </table>

@endsection