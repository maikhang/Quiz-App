@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Question
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

            	<form action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
            		@csrf

            		<div class="form-group">
            			<label>Choose Quiz</label>
						<div class="controls">
							<select name="quiz" value="{{old('quiz')}}" id="" class="form-control">
								@foreach(App\Models\Quiz::all() as $quiz)
								<option value="{{$quiz->id}}" selected>{{$quiz->name}}</option>
								@endforeach
							</select>
						</div>
						@error('quiz')
						<span class="invalid-feedback alert-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
            		</div>

            		<div class="form-group">
						<label class="control-lable" for="name">Question Name</label>
						<div class="controls">
							<input type="text" name="question" class="form-control @error('question') border-red @enderror" placeholder="Name of a Question" value="{{old('question')}}" >
						</div>
						@error('question')
						<span class="invalid-feedback alert-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

					<div class="form-group">
						<label class="control-lable" for="options">Options</label>
						<div class="controls">
							@for($i=0;$i<4;$i++)
							<div style="display: flex">
								<input type="text" name="options[]" style="width: 75%!important; margin-bottom: 10px;" class="form-control @error('options') border-red @enderror" value="{{old('options[]')}}" placeholder="Option {{$i+1}}" required="" >

								<input type="radio" style="margin: 10px 5px 0 10px;" name="correct_answer" value="{{$i}}" >
								<div style="margin-top: 5px;">Is Correct Answer</div>
							</div>
							@endfor
						</div>
						@error('options.*')
						<span class="invalid-feedback alert-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						@error('correct_answer')
						<span class="invalid-feedback alert-danger" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>

            		<button type="submit" class="btn btn-success">Submit</button>
            		<button type="reset" class="btn btn-info">Reset</button>
            	</form>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection('content')