<style>
    .thumbnail {
        border: none !important; /* Xóa viền */
    }
</style>
@extends('dashboard')
@section('content')
<main class="read-car">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                    {{-- <h3 class="card-header text-center bg-dark text-light">Car Details</h3> --}}
                    <div class="card-body">
                        @if($car)
                        <!-- Image Section -->
                                <!-- Carousel -->
                                <div id="carCarousel" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px;margin: auto;">
                                    <div class="carousel-inner text-center">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/' . $car->image) }}" class="d-block mx-auto img-fluid rounded" alt="{{ $car->name }}" style="max-height: 800px;">
                                        </div>
                                        @foreach($car->images as $image)
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/' . $image->image) }}" class="d-block mx-auto img-fluid rounded" alt="Additional Image" style="max-height: 800px;">
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Carousel Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <!-- Thumbnails -->
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-2">
                                        <img src="{{ asset('images/' . $car->image) }}" class="img-thumbnail thumbnail" alt="Main Image" style="cursor: pointer;">
                                    </div>
                                    @foreach($car->images as $image)
                                    <div class="col-2">
                                        <img src="{{ asset('images/' . $image->image) }}" class="img-thumbnail thumbnail" alt="Thumbnail" style="cursor: pointer;">
                                    </div>
                                    @endforeach
                                </div>

                        <!-- Information Section -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class="text-start">Name </th>
                                            <td class="text-end">{{ $car->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Brand</th>
                                            <td class="text-end">{{ $car->brand }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Manufacturee </th>
                                            <td class="text-end">{{ $car->manufacture }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Price </th>
                                            <td class="text-end" style="font-size: 1em; color: red;">{{ number_format($car->price) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Amount </th>
                                            <td class="text-end">{{ $car->amount  }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Description </th>
                                            <td class="text-end">{{ $car->description   }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <p>Car not found</p>
                        @endif
                    </div>
                    <div class="card-footer text-center py-3">
                        <a href="{{ route('listcar') }}" class="btn btn-lg btn-dark">Back to Cars</a>
                    </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const thumbnails = document.querySelectorAll('.thumbnail');
            const carousel = new bootstrap.Carousel(document.querySelector('#carCarousel'));

            thumbnails.forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', () => {
                    carousel.to(index); // Chuyển carousel đến slide tương ứng
                });
            });
        });
    </script>
</main>
@endsection
