@extends('layouts.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in Admin!') }}
                    <br />
                    <a href="{{route('user.dashboard')}}">user</a>
                    <br />
                    <a href="{{route('category')}}">Category</a>
                    <br />
                    <a href="{{route('category.list')}}">Category List</a>
                    <br />
                    <a href="{{route('products.index')}}">Product</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
