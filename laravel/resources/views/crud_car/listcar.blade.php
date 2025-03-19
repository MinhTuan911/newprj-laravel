@extends('dashboard')

@section('content')

    <main class="list-car">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <style>
                        .card {
                            border: none !important;
                            position: relative;
                            overflow: hidden;
                        }

                        /* Áp dụng hiệu ứng transform khi hover cho card bên trong */
                        .card .card {
                            transition: transform 0.3s ease-in-out;
                        }

                        .card .card:hover {
                            transform: scale(1.15);
                        }

                        .card-overlay {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            background-color: rgba(255, 255, 255, 0.7);
                            transform: translateY(100%);
                            transition: transform 0.3s ease-in-out;
                            padding: 1rem;
                            opacity: 0;
                            pointer-events: none;
                        }

                        .card:hover .card-overlay {
                            transform: translateY(-20px);
                            opacity: 1;
                            pointer-events: auto;
                        }

                        .card-actions {
                            position: absolute;
                            bottom: 0;
                            left: 50%;
                            transform: translateX(-50%);
                            opacity: 0;
                            transition: opacity 0.3s ease-in-out;
                        }

                        .card-overlay:hover .card-actions {
                            opacity: 1;
                        }

                        /* Đảm bảo rằng tất cả hình ảnh đều có kích thước cố định và không bị bóp méo */
                        .card-img-top {
                            width: 100%;
                            height: auto;
                        }

                        .card-actions {
                            position: absolute;
                            bottom: 30px;
                            left: 50%;
                            transform: translateX(-50%);
                            opacity: 0;
                            transition: opacity 0.3s ease-in-out;
                            display: flex;
                            /* Sử dụng Flexbox */
                            justify-content: center;
                            /* Căn giữa các nút */
                            align-items: center;
                            /* Căn chỉnh theo chiều dọc */
                            gap: 5px;
                            /* Khoảng cách giữa các nút */
                        }

                        /* Đảm bảo form và các nút có cùng kích thước */
                        .card-actions .btn {
                            width: 60px;
                            /* Cố định chiều rộng để các nút bằng nhau */
                            text-align: center;
                            /* Căn giữa nội dung trong nút */
                        }

                        /* Đảm bảo form không làm lệch layout */
                        .card-actions form {
                            display: inline-flex;
                            /* Sử dụng inline-flex để form nằm ngang */
                            margin: 0;
                            /* Loại bỏ margin thừa */
                        }
                    </style>

                    <div class="card" style="margin-top: 150px;">
                        <h3 class="card-header text-center bg-dark text-light mt-5" >List of Cars</h3>
                        <div class="card-body mt-5 ">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach($cars as $car)
                                    <div class="col">
                                        <div class="card">
                                            <img src="/./images/{{ $car->image }}" class="card-img-top" alt="Car Image">
                                            <div class="card-overlay">
                                                <div class="card-actions">
                                                    <a href="{{ route('showcar', ['id' => $car->id]) }}"
                                                        class="btn btn-primary btn-sm ">View</a>
                                                    <a href="{{ route('editcar', ['id' => $car->id]) }}"
                                                        class="btn btn-primary btn-sm ">Edit</a>
                                                    <form method="POST" action="{{ route('deletecar', ['id' => $car->id]) }}"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $car->name }}</h5>
                                                <p class="card-text">
                                                    <strong>Price:</strong> {{ number_format($car->price) }} VND<br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="pagination justify-content-center mt-5">
                            {{ $cars->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>

@endsection