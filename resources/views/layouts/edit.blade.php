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
                    <div class="container">
                        <h1 class="my-4">Edit Alternatif</h1>
                        <form action="{{ route('layouts.update', $alternatif->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control" value="{{ $alternatif->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="number" name="harga" class="form-control" value="{{ $alternatif->harga }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cpu">CPU:</label>
                                <input type="number" name="cpu" class="form-control" value="{{ $alternatif->cpu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="ram">RAM:</label>
                                <input type="number" name="ram" class="form-control" value="{{ $alternatif->ram }}" required>
                            </div>
                            <div class="form-group">
                                <label for="storage">Storage:</label>
                                <input type="number" name="storage" class="form-control" value="{{ $alternatif->storage }}" required>
                            </div>
                            <div class="form-group">
                                <label for="ping">Ping:</label>
                                <input type="number" name="ping" class="form-control" value="{{ $alternatif->ping }}" required>
                            </div>
                            <div class="form-group">
                                <label for="backup">Backup:</label>
                                <input type="number" name="backup" class="form-control" value="{{ $alternatif->backup }}" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('layouts.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>
                    
