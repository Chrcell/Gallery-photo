<title> {{ $title->name }} | UPLOAD PHOTO </title>

@section('content')
    <div class="container-fluid">
        <h3 class="fw-bold text-center text-light">UPLOAD FOTO</h3>
        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf

            <div class="row">
                <div class="col-lg-2 mt-2">
                    <label class="fw-bold text-start text-dark" for="profile">WALLPAPER</label>
                </div>
                <div class="col-lg-10 form-floating mb-3">
                    <input type="file" id="image" name="image" value="{{ old('image') }}" class="form-control bg-light @error('image') is-invalid @enderror" placeholder="image">
                    @error('image')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 mt-2">
                    <label class="fw-bold text-start text-dark" for="image_title">Judul</label>
                </div>
                <div class="col-lg-10 form-floating mb-3">
                    <input type="text" id="image_title" image_title="image_title" value="{{ old('image_title') }}" class="form-control bg-light @error('image_title') is-invalid @enderror" placeholder="image_title">
                    @error('image_title')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 mt-2">
                    <label class="fw-bold text-start text-dark" for="tag">Tag</label>
                </div>
                <div class="col-lg-10 form-floating mb-3">
                    <input type="text" id="tag" name="tag" value="{{ old('tag') }}" class="form-control bg-light @error('tag') is-invalid @enderror" placeholder="tag">
                    @error('tag')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 mt-2">
                    <label class="fw-bold text-start text-dark" for="description">Deskripsi</label>
                </div>
                <div class="col-lg-10 form-floating mb-3">
                    <input type="text" id="description" name="description" value="{{ old('description') }}" class="form-control bg-light @error('description') is-invalid @enderror" placeholder="description">
                    @error('description')
                        <div class="invalid-feedback text-start">
                            <b>{{ $message }}</b>
                        </div>
                    @enderror
                </div>
            </div>

            
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>