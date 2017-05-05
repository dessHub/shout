@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Complaints</div>

                <div class="panel-body">
                    <div>

                        <table id="example" class="table table-striped table-hover table-bordered" bgcolor="#fff8dc">

                            <thead>
                            <tr>
                                <th>Report ID</th>
                                <th>First Name </th>
                                <th>School </th>
                                <th>Report </th>
                                <th>Status </th>
                                <th>Reported On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->fname }}</td>
                                    <td>{{ $report->school }}</td>
                                    <td>{{ $report->complaint }}</td>
                                    <td>{{ $report->status }}</td>
                                    <td>{{ $report->created_at }}</td>
                                    <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#{{ $report->id }}">Confirm Reception
                                                </button>
                                            </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@foreach($reports as $report)
<div id="{{ $report->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Accept the Report</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/receive') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type="hidden" id="id" name="id" value="{{ $report->id }}">
                    <input class="form-control" type="hidden" id="lname" name="lname" value="{{ Auth::user()->fname }}">
                    <input class="form-control" type="hidden" id="lname" name="lname" value="{{ Auth::user()->fname }}">
                    <input class="form-control" type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}"/>
                    <input class="form-control" type="hidden" name="status" id="status" value="received"/>
                    <input id="admNo" type="hidden" class="form-control" name="admNo" value="{{ $report->admNo }}">
                    <input id="school" type="hidden" class="form-control" name="school" value="{{ $report->school }}">
                    <input id="guardian_fname" type="hidden" class="form-control" name="guardian_fname" value="{{ $report->guardian_fname }}">
                    <input id="guardian_lname" type="hidden" class="form-control" name="guardian_lname" value="{{ $report->guardian_lname }}">
                    <input id="guardian_phone" type="hidden" class="form-control" name="guardian_phone" value="{{ $report->guardian_phone }}">

                </div>
                </div>

            <div class="form-group">
                <label for="complaint" class="col-md-4 control-label">Complaint</label>

                <div class="col-md-6">
                    <textarea id="complaint" class="form-control ckeditor" name="complaint">{{$report->complaint}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Receive
                    </button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
@endsection
