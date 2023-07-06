@php
    $session_user = session('user');
@endphp
@include('common.Header')
<div class="container-fluid mt-4">

    <div class="row">
        <div>
            <form>
                <label for="search">
                    <input name="search" class="form-control" type="text" placeholder="Search items">
                </label>
                <button class="btn btn-primary my-2" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="table-responsive shadow  border p-4">
        <h1 class="p-4">Users Data</h1>
        <table class="table">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Email</th>
                    @if ($session_user->role == 'admin')
                        <th>Delete</th>
                    @endif
                    @if ($session_user->role == 'admin')
                        <th>Edit</th>
                    @endif
                </tr>

            </thead>
            <tbody>



                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->gender }}</td>
                        <td>{{ $record->city }}</td>
                        <td>{{ $record->email }}</td>
                        @if ($session_user->role == 'admin')
                            <td>
                                <form action="{{ route('records.destroy', $record->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif

                        @if ($session_user->role == 'admin')
                            <td>
                                <form action="{{ route('records.edit', $record->id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-secondary">Edit</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <div class="row p-4">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($records->currentPage() > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ url('/dashboard', $records->currentPage() - 1) }}"
                        rel="prev">Previous</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($records->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ url('/dashboard', $records->currentPage() + 1) }}"
                        rel="next">Next</a>
                </li>
            @endif

        </ul>
    </div>

    <div class="row shadow ">
        <div class="col">
            @include('partials.LastFiveRecords')
        </div>
    </div>

</div>


@include('common.Footer')
