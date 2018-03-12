@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$student->name}}
                        <a class="btn btn-primary btn-xs pull-right" href="{{ route('student.index') }}"> students</a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <span>{{$student->name}}</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Roll:</strong>
                                    <span>${{$student->roll}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4><strong>All courses </strong></h4>
                                @foreach($courses as $course)
                                    <button class="btn btn-default">
                                        {{ HTML::linkRoute('course.show', $course->title, $course->id, array('class' => '')) }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

