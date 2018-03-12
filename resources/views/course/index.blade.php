@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Courses
                        <a class="btn btn-primary btn-xs pull-right" href="{{ route('course.create') }}"> Create course </a>
                    </div>

                    {{--<div class="panel-body">--}}
                    <ul class="list-group">
                        @foreach($courses as $course)
                            <li class="list-group-item">
                                {{ HTML::linkRoute('course.show', $course->title, $course->id, array('class' => '')) }}
                                <div class="btn-group btn-group-xs pull-right" role="group" aria-label="Extra-small button group">
                                    {{ HTML::linkRoute('course.show', 'Show', $course->id, array('class' => 'btn btn-default')) }}
                                    {{--<a class="btn btn-default">Edit</a>--}}
                                    {{ HTML::linkRoute('course.edit', 'Edit', $course->id, array('class' => 'btn btn-default')) }}
                                    {!! Form::open(['method' => 'DELETE','route' => ['course.destroy', $course->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-default btn-xs']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
