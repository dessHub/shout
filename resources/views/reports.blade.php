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
                                <th>First Name </th>
                                <th>Adm No </th>
                                <th>School </th>
                                <th>Guardian First Name </th>
                                <th>Guardian Last Name </th>
                                <th>Guardian Mobile No </th>
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
                                    <td>{{ $report->fname }}</td>
                                    <td>{{ $report->admNo }}</td>
                                    <td>{{ $report->school }}</td>
                                    <td>{{ $report->guardian_fname }}</td>
                                    <td>{{ $report->guardian_lname }}</td>
                                    <td>{{ $report->guardian_phone }}</td>
                                    <td>{{ $report->complaint }}</td>
                                    <td>{{ $report->status }}</td>
                                    <td>{{ $report->created_at }}</td>
                                    <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#{{ $report->id }}">View
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
        <h4 class="modal-title">Report Details</h4>
      </div>
      <div class="modal-body">
        <div>
          <div><u>Student Details</u></div>
         <div class="row">
          <div class="col-md-6">
           <h4><strong>First Name: </strong> {{ $report->fname }}</h4>
          </div>
           <div class="col-md-6">
            <h4><strong>Last Name: </strong>  {{ $report->lname }}</h4>
          </div>
         </div>
          <div class="row">
           <div class="col-md-6">
            <h4><strong>Adm No: </strong> {{ $report->admNo }}</h4>
           </div>
            <div class="col-md-6">
             <h4><strong>School: </strong>  {{ $report->school }}</h4>
           </div>
          </div>

             <div><u>Guardians Details</u></div>
            <div class="row">
             <div class="col-md-6">
              <h4><strong>First Name: </strong> {{ $report->guardian_fname }}</h4>
             </div>
              <div class="col-md-6">
               <h4><strong>Last Name: </strong>  {{ $report->guardian_lname }}</h4>
             </div>
            </div>
             <div class="row">
              <div class="col-md-6">
               <h4><strong>Phone NO: </strong> {{ $report->guardian_phone }}</h4>
              </div>
               <div class="col-md-6">
              </div>
             </div>

             <div><u>Report</u></div>
              <div class="row">
               <div class="col-md-12">
                <p>{{ $report->complaint }}</p>
               </div>
              </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endforeach
@endsection
