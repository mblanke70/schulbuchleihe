@extends ('layout')
        
@section ('content')

<h1>Buchtitel ändern</h1>

{!! Form::model($buchtitel, ['route' => ['buchtitel.update', $buchtitel->id], 'method' => 'put']) !!}

    {{ csrf_field() }}

    <!-- Buchtitel: Titel -->
    <div class="form-group">
        {!! Form::label('titel', 'Titel') !!}
        {!! Form::text('titel') !!}
    </div>

    <!-- Buchtitel: Verlag -->
    <div class="form-group">
        {!! Form::label('verlag', 'Verlag') !!}
        {!! Form::text('verlag') !!}
    </div>

    <!-- Buchtitel: Einzelpreis -->
    <div class="form-group">
        {!! Form::label('preis', 'Preis') !!}
        {!! Form::text('preis') !!}
    </div>

    <!-- Buchtitel: Kennung -->
    <div class="form-group">
        {!! Form::label('kennung', 'Kennung') !!}
        {!! Form::text('kennung') !!}
    </div>

    <!-- Buchtitel: ISBN -->
    <div class="form-group">
        {!! Form::label('isbn', 'ISBN') !!}
        {!! Form::text('isbn') !!}
    </div>

    <button class="btn btn-success" type="submit">Update</button>
    
{!! Form::close() !!}

@endsection