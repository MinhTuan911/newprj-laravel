@extends('dashboard')
@section('content')
    <main class="manufacture-form">
        <div class="container">
            <div class="row justify-content-center">
            <div class="card" style="border: 1px solid black">
                        <h3 class="card-header text-center">Read Manufacture</h3>
                        <div class="card-body" >
                        <div class="row">
                            <div class="col-4" >
                                <p>Name: {{$manufacture->name}}</p>
                                {{-- @if ($users->profile === null) 
                                @else{
                                    <p>First name:$users->profile->first_name</p>
                                    <p>Last name: {{$users->profile->last_name}}</p>
                                }
                                    @endif  --}}                    
                            </div>
                        </div>
                       
                        {{-- <button type="button"><a href="{{ route('edit.user', ['id' => $users->id]) }}">Edit</a> </button> --}}
                        </div>
                    </div>
               
            </div>
        </div>
    </main>
    <style>
        button{
            background: blue;
            float: right;
            padding:0px 20px;
            border-radius: 5px;
        }
        a{
            color: #000;
        }
    </style>
@endsection
