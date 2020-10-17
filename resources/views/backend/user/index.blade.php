@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">User
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
						<th>Password</th>
						<th>Email</th>
                        <th>Occupation</th>
                        <th>Address</th>
                        <th>Phone</th>
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
                        <td>{{$user->visible_password}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->occupation}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>

                        <td class="center">
                        	<a href="{{route('user.edit', $user->id)}}">
							<button class="btn btn-primary" style="margin-right:5px">Edit</button>
						</a></td>
                        <td class="center">
                        	<form id="delete-form{{$user->id}}" method="POST" action="{{route('user.destroy',[$user->id])}}" >
							@csrf
					  		{{method_field('DELETE')}}
							</form>
						  	<a href="#" onclick="if(confirm('Do you want to delete?')){

						  		event.preventDefault();
						  		document.getElementById('delete-form{{$user->id}}').submit()
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