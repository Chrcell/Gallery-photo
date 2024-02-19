@section('content')
    <div class="container mt-5">
        <div class="row">
    <div class="container mt-3 pt-1">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('photo.create') }}" class="btn btn-primary mb-3">UPLOAD</a>

                @if ($pesan = session('success'))
                    <div class="alert alert-dark" role="alert">
                        {{ $pesan }}
                    </div>
                @endif
                <div class="table-responsive mt-3 rounded">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $no => $item)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>
                                        <a href="{{ asset($item->image) }}" style="max-width: 200px; max-height: 150px;">
                                            <img src="{{ asset($item->image) }}" alt="Image" style="max-width: 200px; max-height: 150px;">
                                        </a>
                                    </td>
                                    <td>{{ $item->image_title }}</td>
                                    <td>{{ $item->tag }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a href="{{ route('photo.edit', $item->id) }}" class="btn btn-primary btn-sm mr-1">
                                            Edit
                                        </a>
                                        @if (!$item->manifest->count() > 0)
                                            <form action="{{ route('photo.destroy', $item->id) }}"
                                                onsubmit="return confirm('Yakin Mau Dihapus?')" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm sm-1">
                                                        Hapus Ah
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @stop
        @push('js')
            <script>
                $('#example2').DataTable({
                    "responsive": true,
                });
            </script>
        @endpush