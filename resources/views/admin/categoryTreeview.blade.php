@extends('layouts.admin_dashboard')
@push('links')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link href="/css/treeview.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Manage Category TreeView</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Category List</h3>
                    <ul id="tree1">
                        @foreach($categories as $category)
                        <li>
                            {{ $category->title }}
                            @if(count($category->childs))
                            @include('admin.manageChild',['childs' => $category->childs])
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Add New Category</h3>

                    <form method="POST" action='{{ route("add.category") }}'>
                        @csrf


                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif


                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter title" id="title">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>


                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                            
                            <label>Category</label>
                            <select name="parent_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $allCategories)
                                    <option value="{{@$allCategories->id}}">{{@$allCategories->title}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-success">Add New</button>
                        </div>


                        </form>


                    </div>
                </div>


            </div>
        </div>
        @endsection

        @push('scripts')
        <script src="/js/treeview.js"></script>
        @endpush