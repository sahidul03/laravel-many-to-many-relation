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
                                    {!! Form::select('country_id', $countires, null, ['class' => 'form-control', 'placeholder' => 'Please select a Country']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>District:</strong>
                                    <select name="district_id" class="form-control">
                                        <option>Please select a District</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Thana:</strong>
                                    <select name="thana_id" class="form-control">
                                        <option>Please select a Thana</option>
                                    </select>
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
        $(document).ready(function () {
            $('select[name="country_id"]').on('change', function () {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        url: '/country/' + encodeURI(countryID) + '/districts',
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="district_id"]').empty();
                            $('select[name="district_id"]').append('<option>Please select a District</option>');
                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="district_id"]').empty();
                }
            });

            $('select[name="district_id"]').on('change', function () {
                var districtID = $(this).val();
                if (districtID) {
                    $.ajax({
                        url: '/district/' + encodeURI(districtID) + '/thanas',
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="thana_id"]').empty();
                            $('select[name="thana_id"]').append('<option>Please select a Thana</option>');
                            $.each(data, function (key, value) {
                                $('select[name="thana_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="thana_id"]').empty();
                }
            });
        });
    </script>
@endsection

