    <style> .quantity-form {
        display: flex;
        align-items: center;
        background: #f3f3f3;
        border-radius: 8px;
        padding: 1px;
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
    .btnx{
        background: #fff;
        border: #fff;
        margin-bottom: 50px;
        font-size: 20px;
        font-family: "Comfortaa", sans-serif;
    }
    
    .quantity-btn:hover {
        background: #ddd;
    }
    
    .quantity-input {
        width: 30px;
        text-align: center;
        border: none;
        background: transparent;
        font-size: 16px;
        font-weight: bold;
        outline: none;
    }</style>
@extends('dashboard')

@section('content')
<div class="container">
    <h2 class="mt-4 text-center">Giỏ hàng của bạn</h2>
    <p class="text-center">Có {{ count(session('cart')) }} sản phẩm trong giỏ hàng</p>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="cart-items">
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
                @php $total += $item['price'] * $item['quantity']; @endphp
                <div class="cart-item d-flex align-items-center justify-content-between py-3 border-bottom">
                    <div class="cart-image">
                        <img src="{{ asset('images/' . $item['image']) }}" width="200" alt="{{ $item['name'] }}">
                    </div>
                    <div class="cart-info flex-grow-1 px-3">
                        <h5 class="mb-1">{{ $item['name'] }}</h5>
                        <p class="text-muted mb-0">{{ number_format($item['price'], 0, ',', '.') }}đ</p>
                        <div class="cart-quantity d-flex align-items-center">
                            <form action="{{ route('updatecart', $id) }}" method="POST" class="quantity-form">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="action" value="decrease" class="quantity-btn">-</button>
                                <input type="text" name="quantity" value="{{ $item['quantity'] }}" class="quantity-input" readonly>
                                <button type="submit" name="action" value="increase" class="quantity-btn">+</button>
                            </form>
                        </div>
                    </div>
                    <div class="cart-price text-end">
                        <p class="mb-1 mx-5"><b>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</b></p>
                    </div>
                    <div class="cart-remove">
                        <form action="{{ route('removecart', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btnx">X</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-summary mt-4 text-end">
            <h4>Tổng tiền: <b>{{ number_format($total, 0, ',', '.') }}đ</b></h4>
        </div>
        @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

        {{-- <div class="cart-actions d-flex justify-content-between mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary">🛍 Tiếp tục mua hàng</a>
            <a href="{{ route('checkout') }}" class="btn btn-success">💳 Thanh toán</a>
        </div> --}}
    @else
        <p class="text-center mt-5">Giỏ hàng trống!</p>
    @endif
</div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const quantityForms = document.querySelectorAll(".quantity-form");

    quantityForms.forEach((form) => {
        const decreaseBtn = form.querySelector(".quantity-btn[value='decrease']");
        const increaseBtn = form.querySelector(".quantity-btn[value='increase']");
        const quantityInput = form.querySelector(".quantity-input");
        const maxQuantity = parseInt(quantityInput.getAttribute("max")) || 999;

        if (increaseBtn) {
            increaseBtn.addEventListener("click", function (event) {
                let quantity = parseInt(quantityInput.value);
                if (quantity >= maxQuantity) {
                    event.preventDefault();
                    alert("⚠️ Không thể thêm quá số lượng có trong kho!");
                }
            });
        }
    });
});
</script>
