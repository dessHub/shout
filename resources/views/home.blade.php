@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
               @if(Auth::user()->role == 'normal')
                <div class="panel-body">
                    You are logged in!
                </div>
                @elseif(Auth::user()->role == 'admin')

                 <div class="panel-body">
                     There is/are {{ $reports }} new Reports.

                 </div>
                 @endif
            </div>
        </div>
    </div>
</div>
@endsection
