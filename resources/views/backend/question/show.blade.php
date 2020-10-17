@extends('backend.layouts.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Question Information</h1>
      </div>

      @if(Session::has('message'))
      <div class="alert alert-success">
        {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <div class="col-lg-6">
        <table class="table table-bordered" id="dataTables-example">
          <tbody>
            <tr class="odd gradeX" align="center"><h3 style="margin:0"><b>{{$questions->question}}</b></h3></tr>
            @foreach($questions->answers as $key=>$answer)
            <tr>
              <td class="cell-author hidden-phone hidden-tablet font-weight-bold">
                @switch($key)
                    @case(0)
                        {{'A. '}} {{$answer->answer}}
                        @break
                    @case(1)
                        {{'B. '}} {{$answer->answer}}
                        @break
                    @case(2)
                        {{'C. '}} {{$answer->answer}}
                        @break
                    @case(3)
                        {{'D. '}} {{$answer->answer}}
                        @break
                @endswitch

                @if($answer->is_correct)
                <span class="badge badge-success pull-right">CORRECT</b></span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="module-foot">
          <a href="{{route('question.edit',[$questions->id])}}"> <button class="btn btn-primary">Edit</button></a>

          <form id="delete-form{{$questions->id}}" method="post" action="{{route('question.destroy',[$questions->id])}}" style="display: none">
            @csrf
            {{method_field('DELETE')}}
          </form>
          <a href="" onclick="if(confirm('Do you want to delete?')){
            event.preventDefault();
            document.getElementById('delete-form{{$questions->id}}').submit();
          }else{
            event.preventDefault();
          }
          ">
          <input type="submit" value="Delete" class="btn btn-danger">
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
<!-- /#page-wrapper -->
@endsection('content')
