@extends('layouts.layoutA')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alumno Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong color='RED'> {{ auth::user()->nombres }} {{ auth::user()->apellidos }} </strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
