@extends('dashboard')

@section('content')
<main class="edit-brand-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <h3 class="card-header text-center bg-dark text-light">Edit Brand</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updatebrand', $brand->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $brand->name) }}" required autofocus>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-4 text-center">
                                <button type="submit" class="btn btn-dark btn-lg btn-update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .btn-update {
    width: 300px; 
}
    </style>
</main>
@endsection
