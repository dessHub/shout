@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Complaints</div>

                <div class="panel-body">
                    <div>

                        <table id="example" class="table table-striped table-hover table-bordered" bgcolor="#fff8dc">

                            <thead>
                            <tr>
                                <th>Report ID</th>
                                <th>Report </th>
                                <th>Reported On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->complaint }}</td>
                                    <td>{{ $report->created_at }}</td>
                                    <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                        <li data-toggle="modal" data-target="#acceptModal" data-bookingid="{{ $report->id }}"><a href="{{ url('report/edit/'.$report->id) }}">View/ Edit</a>
                                                        </li>

                                                    <li><a href="{{ url('/report/delete/'.$report->id)}}">Delete</a></li>
                                                </ul>
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
@endsection
