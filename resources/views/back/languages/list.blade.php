@extends('layouts.back')
@section('content')
    <ul id="breadcrumb">
        <li><a href="{{ route('adminDashboard') }}" title="Sample page 1"><span class="entypo-home"></span> Dashboard</a></li>
    </ul>
    <div id="admin-content">
        <div class="container">
            <div class="panel panel-primary">
                @if (Session::has('warning'))
                    <div class="alert alert-warning">
                        <strong>{{ session('warning') }}</strong>
                    </div>
                @endif
                <div class="panel-heading">
                    <h2 id="admin-content-title">Languages list</h2>
                </div>
                @if (count($data) > 0)
                    <div class="content">
                        @include('back.languages.load')
                    </div>
                @else
                    <div class="content">
                        <div class="jumbotron text-center">
                            <h1>Empty Result</h1>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

