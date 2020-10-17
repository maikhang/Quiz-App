@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Question
                    <small>List</small>
                </h1>
            </div>

            <div class="col-lg-12">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            </div>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
						<th>Name</th>
						<th>Quiz</th>
						<th>Created At</th>
						<th>View</th>
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr class="odd gradeX" align="center">
                        <td>{{$question->id}}</td>
						<td>{{$question->question}}</td>
						<td>{{$question->quizzes->name}}</td>
						<td>{{date('d/m/Y', strtotime($question->created_at))}}</td>
						<td class="center">
							<a href="{{route('question.show', $question->id)}}">
							<button class="btn btn-info">View</button>
						</td>
                        <td class="center">
                        	<a href="{{route('question.edit', $question->id)}}">
							<button class="btn btn-primary">Edit</button>
						</a></td>
                        <td class="center">
                        	<form id="delete-form{{$question->id}}" method="POST" action="{{route('question.destroy',[$question->id])}}" >
							@csrf
					  		{{method_field('DELETE')}}
							</form>
						  	<a href="#" onclick="if(confirm('Do you want to delete?')){
						  		event.preventDefault();
						  		document.getElementById('delete-form{{$question->id}}').submit()
						  	}else{
						  		event.preventDefault();
						  	}
						  	">
						<input type="submit" value="Delete" class="btn btn-danger">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection('content')