@extends('backend.layouts.index')

@section('content')
 <!-- Page Content -->
<div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">
 					<small>Edit Question: </small>
 					{{$questions->question}}
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

 				<form action="{{route('question.update', $questions->id)}}" method="POST" enctype="multipart/form-data">
 					@csrf
 					{{method_field('PUT')}}
 					<div class="form-group">
            			<label>Choose Quiz</label>
						<div class="controls">
							<select name="quiz" value="{{$questions->quizzes->name}}" id="" class="form-control">
								@foreach(App\Models\Quiz::all() as $quiz)
									<option value="{{$quiz->id}}"
									@if($quiz->id==$questions->quiz_id)selected @endif >{{$quiz->name}}
									</option>
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
							<input type="text" name="question" class="form-control @error('question') border-red @enderror" placeholder="Name of a Question" value="{{$questions->question}}" >
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
							@foreach($questions->answers as $key=>$answer)
							<div style="display: flex">
								<input type="text" name="options[]" value="{{$answer->answer}}" style="width: 75%!important; margin-bottom: 10px;" class="form-control @error('options') border-red @enderror" required="" >

								<input type="radio" style="margin: 10px 5px 0 10px;" name="correct_answer" value="{{$key}}"@if($answer->is_correct){{'checked'}}@endif >
								<div style="margin-top: 5px;">Is Correct Answer</div>
							</div>
							@endforeach
						</div>
						@error('options')
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
<!-- /#page-wrapper -->
@endsection('content')