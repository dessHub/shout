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
@endsection
