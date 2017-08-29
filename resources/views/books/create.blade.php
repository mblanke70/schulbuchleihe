@extends ('layout')
        
@section ('content')

<h1>Neues Buch</h1>

<form action="{{ url('buecher/') }}" method="POST">
    
    {{ csrf_field() }}

     <div class="form-group">
        <label for="buecher-buchtitel">Buchtitel</label>

        <div>
            <select name="buchtitel_id" class="form-control" id="buecher-buchtitel">
            
    @foreach ($buchtitel as $bt)
        <option value="{{ $bt->id }}">{{ $bt->titel }}</option>
    @endforeach

            </select>
        </div>
    </div>

    <!-- Buecher Anschaffungsjahr -->
    <div class="form-group">
        <label for="buecher-anschaffungsjahr">Anschaffungsjahr</label>

        <div>
            <input type="text" class="form-control" name="anschaffungsjahr" id="buecher-anschaffungsjahr" value="" />
        </div>
    </div>

    <!-- Buecher Schuljahr -->
    <div class="form-group">
        <label for="buecher-leihgebuehr">Leihgebühr</label>

        <div>
            <input type="text" class="form-control" name="leihgebuehr" id="buecher-leihgebuehr" value="" />
        </div>
    </div>

    <!-- Buecher Verlag -->
    <div class="form-group">
        <label for="buecher-neupreis">Neupreis</label>

        <div>
            <input type="text" class="form-control" name="neupreis" id="buecher-neupreis" value="" />
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