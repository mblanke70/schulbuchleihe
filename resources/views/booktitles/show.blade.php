@extends ('layout')
        
@section ('content')

    <h1>Buchtitel</h1>
 
    <table class="table">

        <tr>
            <th>Titel</th>
            <td> {{ $buchtitel->titel }} </td>
        </tr>
        <tr>
            <th>Verlag</th>
            <td> {{ $buchtitel->verlag }} </td>
        </tr>
        <tr>
            <th>Preis</th>
            <td> {{ $buchtitel->preis }} </td>
        </tr>
        <tr>
            <th>Kennung</th>
            <td> {{ $buchtitel->kennung }} </td>
        </tr>
        <tr>
            <th>Bestand</th>
            <td> {{ $buchtitel->bestand }} </td>
        </tr>
        <tr>
            <th>Ausgeliehen</th>
            <td> {{ $buchtitel->ausgeliehen }} </td>
        </tr>
        <tr>
            <th>Leihgebühr</th>
            <td> {{ $buchtitel->leihgebuehr }} &euro; </td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td> {{ $buchtitel->isbn }} </td>
        </tr>
    
    </table>
    

    <hr />


    <h2>Exemplare</h2>
    
    <table class="table">

        <tr>
            <th>ID</th>
            <th>Anschaffungsjahr</th> 
            <th>Ausgeliehen?</th>
            <th>Leihgebuehr</th>
            <th>Neupreis</th>
        </tr>

    @foreach ($buecher as $b)

        <tr>
            <td> {{ $b->id }} </td>
            <td> {{ $b->anschaffungsjahr }} </td>
            <td> {{ $b->ausgeliehen }} </td>
            <td> {{ $b->leihgebuehr }} </td>
            <td> {{ $b->neupreis }} </td>
        </tr>

    @endforeach

    </table>

@endsection