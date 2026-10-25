<h1>Add a Building</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/buildings">
    @csrf

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        <label>Address</label><br>
        <input type="text" name="address" value="{{ old('address') }}">
    </p>

    <p>
        <label>Units</label><br>
        <input type="number" name="units" value="{{ old('units') }}">
    </p>

    <button type="submit">Save building</button>
</form>

<p><a href="/buildings">Back to list</a></p>