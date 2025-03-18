<style>
    .thumbnail {
        border: none !important; /* Xóa viền */
    }
    .cart-quantity {
    display: flex;
    align-items: center;
    background: #f3f3f3;
    border-radius: 8px;
    padding: 5px;
    width: fit-content;
}

.quantity-btn {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 30px;
    height: 30px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.quantity-btn:hover {
    background: #ddd;
}

.quantity-input {
    width: 40px;
    text-align: center;
    border: none;
    background: transparent;
    font-size: 16px;
    font-weight: bold;
    outline: none;
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
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <form action="{{ route('addcart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $car->id }}">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity:</label>
                                    <div class="cart-quantity d-flex align-items-center">
                                        <button type="button" class="quantity-btn decrease-btn">-</button>
                                        <input type="text" id="quantity" name="quantity" value="1" class="quantity-input" readonly max="{{ $car->amount }}">
                                        <button type="button" class="quantity-btn increase-btn">+</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
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
        document.addEventListener("DOMContentLoaded", function () {
    const decreaseBtn = document.querySelector(".decrease-btn");
    const increaseBtn = document.querySelector(".increase-btn");
    const quantityInput = document.querySelector("#quantity");
    const maxQuantity = parseInt(quantityInput.getAttribute("max")) || 999; // Số lượng tối đa

    if (decreaseBtn && increaseBtn && quantityInput) {
        decreaseBtn.addEventListener("click", function () {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });

        increaseBtn.addEventListener("click", function () {
            let quantity = parseInt(quantityInput.value);
            if (quantity < maxQuantity) {
                quantityInput.value = quantity + 1;
            } else {
                alert("⚠️ Bạn không thể thêm quá số lượng có trong kho!"); // Cảnh báo nếu vượt quá
            }
        });
    }
});
    </script>
</main>
@endsection
