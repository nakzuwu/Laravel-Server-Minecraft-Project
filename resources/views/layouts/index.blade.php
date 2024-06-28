@include('layouts.header')

    <div class="container-fluid d-flex flex-column content">
        <div class="row flex-grow-1">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 bg-white">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-9 col-lg-10 p-4 main-content">
                @include('layouts.navbar')
                <div class="container mt-5">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center my-4">
                            <h1 class="mb-0  display-4">Daftar Alternatif</h1>
                            <a href="{{ route('layouts.create') }}" class="btn btn-primary">Add</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>CPU</th>
                                        <th>RAM</th>
                                        <th>Storage</th>
                                        <th>Ping</th>
                                        <th>Backup</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatifs as $alternatif)
                                    <tr>
                                        <td>{{ $alternatif->nama }}</td>
                                        <td>{{ $alternatif->harga }}</td>
                                        <td>{{ $alternatif->cpu }}</td>
                                        <td>{{ $alternatif->ram }}</td>
                                        <td>{{ $alternatif->storage }}</td>
                                        <td>{{ $alternatif->ping }}</td>
                                        <td>{{ $alternatif->backup }}</td>
                                        <td>
                                            <a href="{{ route('layouts.edit', $alternatif->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('layouts.destroy', $alternatif->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-auto">
    @include('layouts.footer')
    </footer>