@extends('dashboard')

@section('content')
    <main class="brand-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card" style="border: 1px solid black">
                    <h3 class="card-header text-center">List Manufacture</h3>
                    <div class="card-body">
                        <table style="border-collapse: collapse;">
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach($brands as $brand)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <th>{{ $brand->name }}</th>
                                    <th>
                                        <a href="{{ route('showbrand', ['id' => $brand->id]) }}" class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('editbrand', ['id' => $brand->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <!-- Use form for delete action -->
                                        <form action="{{ route('deletebrand', ['id' => $brand->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE') <!-- Giả mạo phương thức DELETE -->
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                        <!-- Hiển thị phân trang -->
                        <div class="d-flex justify-content-center">
                            {{ $brands -> links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        td, th {
            border: 1px solid black;
            text-align: center;
            width: 10%;
        }
    </style>
@endsection
