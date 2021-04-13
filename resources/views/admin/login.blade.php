@extends('layouts.admin_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action='{{ url("login/admin") }}' aria-label="{{ __('Login') }}">
            @csrf
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
            </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
</div>
@endsection
