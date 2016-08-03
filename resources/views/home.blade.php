@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Main Dashboard</div>

                <div class="panel-body">
                    <img src="{{ asset('img/example_graph.png') }}" alt="exemplo" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
