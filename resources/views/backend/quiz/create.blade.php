@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quiz
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

            <form action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Quiz Name</label>
                <div class="controls">
                    <input type="text" name="name" class="form-control @error('name') border-red @enderror" placeholder="Name of a Quiz" value=" {{old('name')}}" >
                </div>
                @error('name')
                <span class="invalid-feedback alert-danger" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div>
             <div class="form-group">
                <label>Quiz Description</label>
                <div class="controls">
                <textarea name="description" class="form-control @error('description') border-red @enderror" id="" rows="5">{{old('description')}}</textarea>
             </div>
             @error('description')
             <span class="invalid-feedback alert-danger" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
             @enderror
         </div>
         <div class="form-group">
            <label>Time (in Minutes)</label>
            <div class="controls">
             <input type="text" name="minutes" class="form-control @error('minutes') border-red @enderror" placeholder="Minutes" value=" {{old('minutes')}}" >
         </div>
        @error('minutes')
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
 <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection('content')