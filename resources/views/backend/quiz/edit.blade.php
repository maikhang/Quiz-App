@extends('backend.layouts.index')

@section('content')
 <!-- Page Content -->
<div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<h1 class="page-header">
 					<small>Edit Quiz: </small>
 					{{$quizzes->name}}
 				</h1>
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

 				<form action="{{route('quiz.update', $quizzes->id)}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{method_field('PUT')}}
 					<div class="form-group">
 						<label class="control-lable" for="name">Quiz Name</label>
 						<div class="controls">
 							<input type="text" name="name" class="form-control @error('name') border-red @enderror" placeholder="Name of a Quiz" value="{{$quizzes->name}}" >
 						</div>
 						@error('name')
 						<span class="invalid-feedback alert-danger" role="alert">
 							<strong>{{ $message }}</strong>
 						</span>
 						@enderror
 					</div>

 					<div class="form-group">
 						<label class="control-lable" for="description">Quiz Description</label>
 						<div class="controls">
 							<textarea name="description" class="form-control @error('description') border-red @enderror" id="" rows="5">{{$quizzes->description}}</textarea>
 						</div>
 						@error('description')
 						<span class="invalid-feedback alert-danger" role="alert">
 							<strong>{{ $message }}</strong>
 						</span>
 						@enderror
 					</div>

 					<div class="form-group">
 						<label class="control-lable" for="minutes">Time (in Minutes)</label>
 						<div class="controls">
 							<input type="text" name="minutes" class="form-control @error('minutes') border-red @enderror" placeholder="Minutes" value="{{$quizzes->minutes}}" >
 						</div>
 						@error('minutes')
 						<span class="invalid-feedback alert-danger" role="alert">
 							<strong>{{ $message }}</strong>
 						</span>
 						@enderror
 					</div>

 					<button type="submit" class="btn btn-success">Update</button>
 					<button type="reset" class="btn btn-info">Reset</button>
 				</form>
 			</div>
 		</div>
 		<!-- /.row -->
 	</div>
 	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection('content')