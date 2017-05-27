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
                                <th>Status </th>
                                <th>Reported On</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->complaint }}</td>
                                    <td>{{ $report->status }}</td>
                                    <td>{{ $report->created_at }}</td>
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
