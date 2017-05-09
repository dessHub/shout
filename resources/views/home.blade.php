@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
               @if(Auth::user()->role == 'normal')
                <div class="panel-body">
                    <div class="jumbotron">
                        <div class="" style="text-align:center">Welcome to ShoutApp. </div>
                        <p>Fear no more!. ShoutApp offers you a platform to report defilement ,molestations and rape cases. Your case is discreet .</p>

                    </div>
                </div>
                @elseif(Auth::user()->role == 'admin')

                 <div class="panel-body">
                    <div class="row">
                    <div class="col-md-3 col-xs-12" style="padding-left:20px;text-align:center;">
                      <div class="container-fluid" style="border-style:solid;">
                      <div class="row" style="background-color:skyblue; height:60px; padding-top:20px;">
                        <div class="col-md-6 col-xs-6">
                           <i class="fa fa-btn fa-sign-out"></i>
                       </div>
                         <div class="col-md-6 col-xs-6">
                            {{ $report }} New Report
                        </div>
                        </div>
                        <div>Pending</div>
                       </div>
                    </div>
                    <div class="col-md-3 col-xs-12" style="padding-left:20px;text-align:center;">
                      <div class="container-fluid" style="border-style:solid;">
                      <div class="row" style="background-color:silver; height:60px; padding-top:20px;">
                        <div class="col-md-6 col-xs-6">
                           <i class="fa fa-btn fa-sign-out"></i>
                       </div>
                         <div class="col-md-6 col-xs-6">
                            {{ $rec }} Under Process
                        </div>
                        </div>
                        <div>Report(s)</div>
                       </div>
                    </div>
                    <div class="col-md-3 col-xs-12" style="padding-left:20px;text-align:center;">
                      <div class="container-fluid" style="border-style:solid;">
                      <div class="row" style="background-color:gray; height:60px; padding-top:20px;">
                        <div class="col-md-6 col-xs-6">
                           <i class="fa fa-btn fa-sign-out"></i>
                       </div>
                         <div class="col-md-6 col-xs-6">
                            {{ $closed }} Closed
                        </div>
                        </div>
                        <div>Report(s)</div>
                       </div>
                    </div>
                    <div class="col-md-3 col-xs-12" style="padding-left:20px;text-align:center;">
                      <div class="container-fluid" style="border-style:solid;">
                      <div class="row" style="background-color:darkgray; height:60px; padding-top:20px;">
                        <div class="col-md-6 col-xs-6">
                           <i class="fa fa-btn fa-user"></i>
                       </div>
                         <div class="col-md-6 col-xs-6">
                            {{ $users }} Registered
                        </div>
                        </div>
                        <div>User(s)</div>
                       </div>
                    </div>
                    </div>
                 </div>
                 @endif
            </div>
        </div>
    </div>
</div>
@endsection
