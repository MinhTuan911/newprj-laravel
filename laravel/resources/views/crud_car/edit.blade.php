@extends('dashboard')

@section('content')
<main class="update-car-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mt-5">
                    <h3 class="card-header text-center bg-dark text-light">Update Car</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updatecar', ['id' => $car->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required autofocus>
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
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $car->price }}" required>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" style="height: 100px;" required>{{ $car->description }}</textarea>
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
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" value="{{ $car->amount }}" required>
                                @error('amount')
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
