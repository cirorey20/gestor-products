@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    {{ __('You are logged in!') }} {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-primary" href="{{route('create')}}" role="button">Clients</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-primary" href="{{route('create')}}" role="button">Create Product</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    
                    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            @foreach ($product as $item)    
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td>                                        
                                            <a href="{{ url('/product/delete/') }}/{{ $item->id }}" class="btn btn-sm btn-outline-danger"> Delete </a>
                                        </td>
                                        <td>                                        
                                            <a href="{{ url('/product/edit/') }}/{{ $item->id }}" class="btn btn-outline-success" > Edit </a>
                                        </td>
                                    </tr>
                            @endforeach        
                                
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
