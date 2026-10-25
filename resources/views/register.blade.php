<h1>Register</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf

    <p>
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
    </p>

    <p>
        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
    </p>

    <p>
        <label>Password (min 8 characters)</label><br>
        <input type="password" name="password">
    </p>

    <p>
        <label>Confirm password</label><br>
        <input type="password" name="password_confirmation">
    </p>

    <button type="submit">Create account</button>
</form>

<p>Already registered? <a href="/login">Log in</a></p>