@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <div class="controls">
                    <input type="text" name="name" class="form-control @error('name') border-red @enderror" placeholder="Full Name" value="{{old('name')}}" >
                </div>
                @error('name')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

            <div class="form-group">
                <label>Password</label>
                <div class="controls">
                    <input type="password" name="password" class="form-control @error('password') border-red @enderror" placeholder="Password" value="{{old('password')}}" >
                </div>
                @error('password')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

            <div class="form-group">
                <label>Email</label>
                <div class="controls">
                    <input type="email" name="email" class="form-control @error('email') border-red @enderror" placeholder="Emal" value="{{old('email')}}" >
                </div>
                @error('email')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

             <div class="form-group">
                <label>Occupation</label>
                <div class="controls">
                    <input type="text" name="occupation" class="form-control @error('occupation') border-red @enderror" placeholder="Occupation" value="{{old('occupation')}}" >
                </div>
                @error('occupation')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

             <div class="form-group">
                <label>Address</label>
                <div class="controls">
                    <input type="text" name="address" class="form-control @error('address') border-red @enderror" placeholder="Address" value="{{old('address')}}" >
                </div>
                @error('address')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

             <div class="form-group">
                <label>Phone</label>
                <div class="controls">
                    <input type="text" name="phone" class="form-control @error('phone') border-red @enderror" placeholder="Phone" value="{{old('phone')}}" >
                </div>
                @error('phone')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>

             <button type="submit" class="btn btn-success">Submit</button>
             <button type="reset" class="btn btn-info">Reset</button>
             <form>
     </div>
     </div>
 </div>
 <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection('content')