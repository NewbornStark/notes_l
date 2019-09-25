@csrf
<input type="text" name="name" placeholder="Titulo" value="{{ old('name', $note->name) }}">
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
<textarea name="description" id="description" cols="30" rows="10" 
    placeholder="Escribe tu nota aquí">{{ old('description', $note->description) }}</textarea>
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<br>
<button type="submit">{{ $btnText }} nota</button>