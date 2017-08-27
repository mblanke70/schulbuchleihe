@extends ('layout')
        
@section ('content')


<div class="container">
    <h1>Bücher</h1>
</div>

<div class="container">

   <table class="table">

        <tr>
            <th>ID</th>
            <th>BT-ID</th>
            <th>Titel</th>
            <th>Anschaffungsjahr</th> 
            <th>Ausgeliehen?</th>
            <th>Leihgebuehr</th>
            <th>Neupreis</th>
        </tr>

    @foreach ($buecher as $b)

        <tr>
            <td> {{ $b->id }} </td>
            <td> {{ $b->booktitle->id }} </td>
            <td> {{ $b->booktitle->titel }} </td>
            <td> {{ $b->anschaffungsjahr }} </td>
            <td> {{ $b->ausgeliehen }} </td>
            <td> {{ $b->leihgebuehr }} </td>
            <td> {{ $b->neupreis }} </td>
        </tr>

    @endforeach

    </table>

</div>

@endsection
