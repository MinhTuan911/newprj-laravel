@extends('dashboard')

@section('content')
<main class="add-car-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <h3 class="card-header text-center bg-dark text-light mt-4">Add New Car</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storecar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="brand" class="form-label">Brand</label>
                                <select id="brand" class="form-control" name="brand" required>
                                    <option value="" disabled selected>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="manufacture" class="form-label">Manufacture</label>
                                <select id="manufacture" class="form-control" name="manufacture" required>
                                    <option value="" disabled selected>Select Car Type</option>
                                    @foreach($manufactures as $manufacture)
                                        <option value="{{ $manufacture->name }}">{{ $manufacture->name }}</option>
                                    @endforeach
                                </select>
                                @error('manufacture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" required>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount" required>
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Choose Car Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="images" class="form-label">Choose Sub Car Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple required>
                                @error('images.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 mt-5 text-center">
                                <button type="submit" class="btn btn-dark btn-lg btn-update">Add Car</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<style>
    .btn-update {
        width: 300px; 
    }
</style>
