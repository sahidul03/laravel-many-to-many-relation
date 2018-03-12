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
                        Homes
                        <a class="btn btn-primary btn-xs pull-right" href="{{ route('student.create') }}"> Create student </a>
                    </div>

                    {{--<div class="panel-body">--}}
                    <ul class="list-group">
                        @foreach($students as $student)
                            <li class="list-group-item">
                                {{ HTML::linkRoute('student.show', $student->name, $student->id, array('class' => '')) }}
                                <div class="btn-group btn-group-xs pull-right" role="group" aria-label="Extra-small button group">
                                    {{ HTML::linkRoute('student.show', 'Show', $student->id, array('class' => 'btn btn-default')) }}
                                    {{--<a class="btn btn-default">Edit</a>--}}
                                    {{ HTML::linkRoute('student.edit', 'Edit', $student->id, array('class' => 'btn btn-default')) }}
                                    {!! Form::open(['method' => 'DELETE','route' => ['student.destroy', $student->id],'style'=>'display:inline']) !!}
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
