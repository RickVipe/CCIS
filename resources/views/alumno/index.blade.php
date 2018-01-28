@extends('layouts.layoutA')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ALUMNO Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @else
                        <div class="alert alert-success">
                            <strong>{{ auth::user()->id }}</strong>
                        </div>
                    @endif

                    You are logged in as <strong>ALUMNO </strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection