@extends('backend.layouts.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @foreach($quizzes as $quiz)
            <div class="col-lg-12">
                <h1 class="page-header">Quiz: {{$quiz->name}}</h1>
            </div>

            <div class="col-lg-12">
            @foreach($quiz->questions as $key => $question)
            <table class="table table-bordered" id="dataTables-example">
                <tbody>
                    <tr class="odd gradeX" align="center"><b>{{$key+1}}. {{$question->question}}</b></tr>
                    <tr>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                    <td class="cell-author hidden-phone hidden-tablet col-lg-6">
                        @foreach($question->answers as $key => $answer)
                        <p>
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
                            <span class="badge badge-success" style="margin-left: 5px;">
                                CORRECT
                            </span>
                            @endif
                        </p>
                        @endforeach
                    </td>
                    <td class="center col-lg-2">
                        <a href="{{route('question.edit',[$question->id])}}"> <button class="btn btn-primary">Edit</button></a>

                        <form id="delete-form{{$question->id}}" method="post" action="quiz/{{$question->id}}/question/delete" style="display: none">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                        <a href="" onclick="if(confirm('Do you want to delete?')){
                            event.preventDefault();
                            document.getElementById('delete-form{{$question->id}}').submit();
                        }else{
                            event.preventDefault();
                        }
                        ">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </a>
                    </td>
                </tbody>
            </table>
            <div class="module-foot" style="margin: 5px 0 15px 0">

            </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection