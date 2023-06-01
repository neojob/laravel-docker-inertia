@extends('layouts.front')
@section('content')
    <main class="main">

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                           @foreach($products as $item)
{{--                                //ToDo Url To Products--}}
                           @endforeach
                        </div>
                    </div>
                    <div class="row">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
