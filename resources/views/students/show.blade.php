
<h1>Student List</h1>

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
        @foreach ($student as $students)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <form action="{{ route('students.destroy', $students->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>