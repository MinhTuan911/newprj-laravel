@extends('dashboard')

@section('content')
<main class="read-car">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <h3 class="card-header text-center bg-dark text-light mt-5">Read Car</h3>
                    <div class="card-body">
                        @if($car)
                        <div class="row">
                            <div class="col-md-6 order-md-2 text-center mt-2 ">
                                <img src="{{ asset('images/' . $car->image) }}" class="img-fluid rounded" style="width: 350px; height: 250px;" alt="{{ $car->name }}">
                            </div>
                            <div class="col-md-6 order-md-1">
                                <p><strong>Name: <span style="font-size: 1em;">{{ $car->name }}</strong></span></p>
                                <p><strong>Brand: <span style="font-size: 1em;">{{ $car->brand }}</strong></span></p>
                                <p><strong>Manufacture: <span style="font-size: 1em;">{{ $car->manufacture }}</strong></span></p>
                                <p><strong>Price: <span style="font-size: 1em; color: red;">{{ number_format($car->price) }} VND</strong></span></p>
                                <p><strong>Amount: <span style="font-size: 1em;">{{ $car->amount }}</strong></span></p>
                                <p><strong>Description:</strong> <span style="font-size: 1em;">{{ $car->description }}</span></p>
                                {{-- <form method="POST" action="{{ route('cart.add', ['id' => $car->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-lg btn-add-to-cart mt-4">Add to Cart</button>
                                </form> --}}
                            </div>
                        </div>
                        @else
                        <p>Car not found</p>
                        @endif
                    </div>
                    {{-- <div class="card-footer text-center py-3">
                        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-dark">Back Home</a>
                    </div> --}}
                    <div class="card-footer text-center py-3">
                        <a href="{{ route('listcar') }}" class="btn btn-lg btn-dark">Back to Cars</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            border: none !important;
            /* Loại bỏ khung viền */
            border-radius: 0;
            /* Loại bỏ bo tròn góc */
            box-shadow: none !important;
            /* Loại bỏ bóng đổ */
        }

        .card-body img {
            transition: transform 0.3s ease-in-out;
            /* Thêm transition cho hiệu ứng mượt mà */
        }

        .card-body img:hover {
            transform: scale(1.2);
            /* Kích thước của hình ảnh tăng lên 20% */
        }
    </style>
</main>
@endsection