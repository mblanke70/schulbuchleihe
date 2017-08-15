@extends ('layout')
        
@section ('content')

<h1>Neuer Buchtitel</h1>

<form action="{{ url('buchtitel/') }}" method="POST">
    
    {{ csrf_field() }}

    <!-- Buchtitel Titel -->
    <div class="form-group">
        <label for="buchtitel-titel">Titel</label>

        <div>
            <input type="text" class="form-control" name="titel" id="buchtitel-titel" value="" />
        </div>
    </div>

    <!-- Buchtitel Verlag -->
    <div class="form-group">
        <label for="buchtitel-verlag">Verlag</label>

        <div>
            <input type="text" class="form-control" name="verlag" id="buchtitel-verlag" value="" />
        </div>
    </div>

    <!-- Buchtitel Einzelpreis -->
    <div class="form-group">
        <label for="buchtitel-einzelpreis">Einzelpreis</label>

        <div>
            <input type="text" class="form-control" name="preis" id="buchtitel-einzelpreis" value="" />
        </div>
    </div>

    <!-- Buchtitel Kennung -->
    <div class="form-group">
        <label for="buchtitel-kennung">Kennung</label>

        <div>
            <input type="text" class="form-control" name="kennung" id="buchtitel-kennung" value="" />
        </div>
    </div>

    <!-- Buchtitel ISBN -->
    <div class="form-group">
        <label for="buchtitel-isbn">Best_Nr</label>

        <div>
            <input type="text" class="form-control" name="isbn" id="buchtitel-isbn" value="" />
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