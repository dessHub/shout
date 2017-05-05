@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Report a complaint</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/report') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-6">
                                <input class="form-control" type="hidden" id="fname" type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}">
                                <input class="form-control" type="hidden" id="lname" type="text" class="form-control" name="lname" value="{{ Auth::user()->fname }}">
                                <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>

                            </div>
                            </div>

                        <div class="form-group{{ $errors->has('admNo') ? ' has-error' : '' }}">
                            <label for="admNo" class="col-md-4 control-label">Admission No</label>

                            <div class="col-md-6">
                                <input id="admNo" type="text" class="form-control" name="admNo" value="{{ old('admNo') }} " required="true">

                                @if ($errors->has('admNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                            <label for="school" class="col-md-4 control-label">School Name</label>

                            <div class="col-md-6">
                                <input id="school" type="type" class="form-control" name="school">

                                @if ($errors->has('school'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('guardian_fname') ? ' has-error' : '' }}">
                            <label for="guardian_fname" class="col-md-4 control-label">Guardian First Name</label>

                            <div class="col-md-6">
                                <input id="guardian_fname" type="text" class="form-control" name="guardian_fname">

                                @if ($errors->has('guardian_fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian_fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('guardian_lname') ? ' has-error' : '' }}">
                            <label for="guardian_lname" class="col-md-4 control-label">Guardian Last Name</label>

                            <div class="col-md-6">
                                <input id="guardian_lname" type="text" class="form-control" name="guardian_lname">

                                @if ($errors->has('guardian_lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian_lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('guardian_phone') ? ' has-error' : '' }}">
                            <label for="guardian_phone" class="col-md-4 control-label">Guardian Mobile No</label>

                            <div class="col-md-6">
                                <input id="guardian_phone" type="text" class="form-control" name="guardian_phone">

                                @if ($errors->has('guardian_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('complaint') ? ' has-error' : '' }}">
                            <label for="complaint" class="col-md-4 control-label">Complaint</label>

                            <div class="col-md-6">
                                <textarea id="complaint" class="form-control ckeditor" name="complaint"></textarea>

                                @if ($errors->has('complaint'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('complaint') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Report
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
