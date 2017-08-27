@extends ('layout')
        
@section ('content')

<h1>Neue Bücherliste</h1>

<form action="{{ url('buchlisten/') }}" method="POST">
    
    {{ csrf_field() }}

    <!-- Buchtitel Titel -->
    <div class="form-group">
        <label for="buchlisten-jahrgang">Jahrgang</label>

        <div>
            <input type="text" class="form-control" name="jahrgang" id="buchlisten-jahrgang" value="" />
        </div>
    </div>

    <!-- Buchtitel Verlag -->
    <div class="form-group">
        <label for="buchlisten-schuljahr">Schuljahr</label>

        <div>
            <input type="text" class="form-control" name="schuljahr" id="buchlisten-schuljahr" value="" />
        </div>
    </div>

    <!-- Add Task Button -->
    <div>
        <div>
            <button type="submit">Create</button>
        </div>
    </div>

</form>

@endsection