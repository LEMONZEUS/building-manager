<h1>Buildings (loaded with JavaScript)</h1>

<ul id="list">
    <li>Loading...</li>
</ul>

<p><a href="/buildings">Back to buildings</a></p>

<script>
    fetch('/api/buildings', { headers: { 'Accept': 'application/json' } })
        .then(response => response.json())
        .then(buildings => {
            const list = document.getElementById('list');
            list.innerHTML = '';

            buildings.forEach(building => {
                const item = document.createElement('li');
                item.textContent = building.name + ' (' + building.units + ' units)';
                list.appendChild(item);
            });
        })
        .catch(() => {
            document.getElementById('list').innerHTML = '<li>Could not load buildings.</li>';
        });
</script>