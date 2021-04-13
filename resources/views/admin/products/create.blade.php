@extends('layouts.admin_dashboard')
@section('content')
 <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('products.store')}}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="description"
                        placeholder="description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Put the price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{@$category->id}}">{{@$category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub Category:</strong>
                    <select name="sub_category">
                        <option value="">Select Sub Category</option>
                        @foreach($sub_categories as $sub_category)
                            <option value="{{@$sub_category->id}}">{{@$sub_category->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <script type="text/javascript">
         $(document).ready(function () { 
            $('#category').on('change',function(e){
            console.log(e);
            var cat_id = e.target.value;
            //console.log(cat_id);
            //ajax
            $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                //success data
               //console.log(data);
                var subcat =  $('#subcategory').empty();
                $.each(data,function(create,subcatObj){
                    var option = $('<option/>', {id:create, value:subcatObj});
                    subcat.append('<option value ="'+subcatObj+'">'+subcatObj+'</option>');
                });
            });
        });
    });
    </script>
        @endsection
