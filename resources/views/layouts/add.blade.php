@include('layouts.header')

    <div class="container-fluid d-flex flex-column content">
        <div class="row flex-grow-1">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 bg-white">
                @include('layouts.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4 main-content">
                @include('layouts.navbar')
                <div class="container mt-5">
                    
                <h1 class="mb-0  display-4">Add Data</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                    <form action="{{ route('layouts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Name:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Price:</label>
                            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="cpu">CPU:</label>
                            <input type="number" step="0.01" class="form-control" id="cpu" name="cpu" required>
                        </div>
                        <div class="form-group">
                            <label for="ram">RAM:</label>
                            <input type="number" step="0.01" class="form-control" id="ram" name="ram" required>
                        </div>
                        <div class="form-group">
                            <label for="storage">Storage:</label>
                            <input type="number" step="0.01" class="form-control" id="storage" name="storage" required>
                        </div>
                        <div class="form-group">
                            <label for="ping">Ping:</label>
                            <input type="number" step="0.01" class="form-control" id="ping" name="ping" required>
                        </div>
                        <div class="form-group">
                            <label for="backup">Backup:</label>
                            <input type="number" step="0.01" class="form-control" id="backup" name="backup" required>
                        </div>
                        <button type="submit" class="btn btn-primary">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>
