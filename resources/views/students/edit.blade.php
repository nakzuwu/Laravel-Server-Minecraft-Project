<h1>Edit Student</h1>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $student->name }}"><br>
    <label for="nim">NIM:</label><br>
    <input type="text" id="nim" name="nim" value="{{ $student->nim }}"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{ $student->email }}"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone" value="{{ $student->phone }}"><br><br>
    <button type="submit">Update</button>
</form>