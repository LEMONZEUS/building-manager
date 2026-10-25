<h1>Edit Building</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/buildings/{{ $building->id }}">
    @csrf
    @method('PUT')

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $building->name) }}">
    </p>

    <p>
        <label>Address</label><br>
        <input type="text" name="address" value="{{ old('address', $building->address) }}">
    </p>

    <p>
        <label>Units</label><br>
        <input type="number" name="units" value="{{ old('units', $building->units) }}">
    </p>

    <button type="submit">Update building</button>
</form>

<p><a href="/buildings">Back to list</a></p>