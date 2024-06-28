<!-- resources/views/students/index.blade.php -->

<h1>Student List</h1>
<form action="{{ route('items.create') }}" method="GET">
    @csrf
    <button type="submit">New</button>
</form>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <form action="{{ route('students.edit', $student->id) }}" method="GET">
                        @csrf
                        <button type="submit">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
