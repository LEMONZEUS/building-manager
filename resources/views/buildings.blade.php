<div>
    Logged in as {{ auth()->user()->name }} ({{ auth()->user()->role }})
    <form method="POST" action="/logout" style="display:inline;">
        @csrf
        <button type="submit">Log out</button>
    </form>
</div>

<h1>Our Buildings</h1>

<ul>
    @foreach ($buildings as $building)
        <li>
            <a href="/buildings/{{ $building->id }}">{{ $building->name }}</a>
            ({{ $building->units }} units), {{ $building->address }}

            @if (auth()->user()->role === 'admin')
                <a href="/buildings/{{ $building->id }}/edit">Edit</a>

                <form method="POST" action="/buildings/{{ $building->id }}" style="display:inline;"
                      onsubmit="return confirm('Delete this building?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endif
        </li>
    @endforeach
</ul>

@if (auth()->user()->role === 'admin')
    <p><a href="/buildings/create">Add a building</a></p>
@endif