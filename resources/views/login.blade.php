<h1>Log in</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/login">
    @csrf

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </p>

    <p>
        <label>Password</label><br>
        <input type="password" name="password">
    </p>

    <button type="submit">Log in</button>
</form>

<p>No account? <a href="/register">Register</a></p>