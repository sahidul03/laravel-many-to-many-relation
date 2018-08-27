@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create New Student
                        <a class="btn btn-primary btn-xs pull-right" href="{{ route('student.index') }}"> Students</a>
                    </div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(array('route' => 'student.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Roll:</strong>
                                    {!! Form::text('roll', null, array('placeholder' => 'Roll','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Country:</strong>
                                    {!! Form::select('country_id', $countires, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>District:</strong>
                                    <select name="district" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Thana:</strong>
                                    <select name="thana" class="form-control"></select>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $('select[name="country_id"]').on('change', function() {
            var countryID = $(this).val();
                if(countryID) {
                $.ajax({
                    url: '/country/' + encodeURI(countryID) + '/districts',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    $('select[name="district"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="district"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                });
                }else{
                $('select[name="district"]').empty();
                  }
               });
            });
    </script>
@endsection

