<div>
    Logged in as {{ auth()->user()->name }} ({{ auth()->user()->role }})
    <form method="POST" action="/logout" style="display:inline;">
        @csrf
        <button type="submit">Log out</button>
    </form>
</div>

<h1>{{ $building->name }}</h1>
<p>{{ $building->address }} &middot; {{ $building->units }} units</p>

<h2>Maintenance Requests</h2>

@forelse ($building->maintenanceRequests as $req)
    <div style="border:1px solid #ccc; padding:8px; margin-bottom:8px;">
        <strong>{{ $req->title }}</strong>
        [{{ $req->status }}]
        <p>{{ $req->description }}</p>

        @if ($req->status === 'open' && auth()->user()->role === 'admin')
            <form method="POST" action="/requests/{{ $req->id }}/resolve">
                @csrf
                @method('PATCH')
                <button type="submit">Mark resolved</button>
            </form>
        @endif
    </div>
@empty
    <p>No requests yet.</p>
@endforelse

<h2>Submit a Request</h2>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/buildings/{{ $building->id }}/requests">
    @csrf

    <p>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>

    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4">{{ old('description') }}</textarea>
    </p>

    <button type="submit">Submit request</button>
</form>

<p><a href="/buildings">Back to buildings</a></p>