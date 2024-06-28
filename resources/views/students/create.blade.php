<h1>Create New Student</h1>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="nim">NIM:</label><br>
    <input type="text" id="nim" name="nim"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone"><br><br>
    <button type="submit">Submit</button>
</form>