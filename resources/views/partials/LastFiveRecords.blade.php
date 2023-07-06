
<div class="table-responsive shadow  border p-4">
    <h1 class="p-4">Latest five records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>City</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($latestRecords->sortByDesc('id')->take(5) as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name }}</td>
                    <td>{{ $record->gender }}</td>
                    <td>{{ $record->city }}</td>
                    <td>{{ $record->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

