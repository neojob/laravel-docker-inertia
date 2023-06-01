@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 id="admin-content-title">Category list</h2>
                </div>
                <div id="request">

                </div>
                @if (count($data) > 0)
                    <div class="content">
                        @include('back.categories.load')
                    </div>
                @else
                    <div class="content">
                        <div class="jumbotron text-center">
                            <h1>Empty result</h1>
                        </div>
                    </div>
                @endif
                <div class="request">

                </div>
            </div>
        </div>
    </div>
@endsection
