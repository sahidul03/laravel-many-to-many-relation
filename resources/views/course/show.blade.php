@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$course->title}}
                        <a class="btn btn-primary btn-xs pull-right" href="{{ route('course.index') }}"> Courses</a>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    <span>{{$course->title}}</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                {!! Form::open(array('route' => 'course_student.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
                                {{ Form::hidden('course_id', $course->id, array('id' => 'course_id')) }}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select a student</strong>
                                            {!! Form::select('student_id', $array_std, ['id' => 'name'], array('placeholder' => 'Select a student','class' => 'form-control','required' => 'required')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4><strong>Students of {{$course->title}} course</strong></h4>
                                @foreach($students as $student)
                                    <button class="btn btn-default">
                                        {{ HTML::linkRoute('student.show', $student->name, $student->id, array('class' => '')) }}
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

