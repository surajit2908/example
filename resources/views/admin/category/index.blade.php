@extends('layouts.admin_dashboard')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('category')}}" title="Create a product"> Add
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
        <th>Category Name</th>
        <th>Parent Category</th>
        <th>Actions</th>
    </tr>
    @foreach ($categories as $key => $category)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$category->title}}</td>
        <td>{{@$category->parent->title ? $category->parent->title : "----"}}</td>
        <td>
            <a href="{{ route('category.edit',$category->id) }}" title="Edit">
                edit
            </a>
             | 
            <a href="{{ route('category.delete',$category->id) }}" title="Delete" onclick="return confirm('Are you sure to delete?');">
                delete
            </a>
        </td>
    </tr>
    @endforeach
</table>

{!! $categories->links() !!}
@endsection
