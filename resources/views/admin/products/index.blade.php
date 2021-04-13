@extends('layouts.admin_dashboard')
@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('products.create')}}" title="Create a product"> Add
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $key => $product)
        
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{@$product->getCategory->title}}</td>
                <td>{{@$product->getSubcategory->title}}</td>
                <td>
                    <form action="" method="POST">


                        <a href="{{route('products.edit', $product->id)}}">
                            Edit
                        </a>
                        <a href="{{route('products.delete', $product->id)}}">
                            Delete
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

        @endsection
