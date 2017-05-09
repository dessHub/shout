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
                                <th>User ID</th>
                                <th>First Name </th>
                                <th>Last Name </th>
                                <th>Email </th>
                                <th>Role </th>
                                <th>SignUp On</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#{{ $user->id }}">Change Roles
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
@foreach($users as $user)
<div id="{{ $user->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/role') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-md-6">
                    <input class="form-control" type="hidden" id="id" name="id" value="{{ $user->id }}">
                    <input class="form-control" type="hidden" id="fname" name="fname" value="{{ $user->fname }}">
                    <input class="form-control" type="hidden" id="lname" name="lname" value="{{ $user->lname }}">
                    <input class="form-control" type="hidden" name="role" id="role" value="admin"/>
                    <input class="form-control" type="hidden" id="email" name="email" value="{{ $user->email }}">

                </div>
                </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Make Admin
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
