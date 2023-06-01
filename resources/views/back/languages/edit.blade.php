@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Edit Language</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            @if (Session::has('warning'))
                <div class="alert alert-warning">
                    <strong>{{ session('warning') }}</strong>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminLanguagesEdit',['id'=>$data['id']]) }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="alias">Name:</label>
                        <input type="text" class="form-control" id="name"  value="{{ $data['name'] }}" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="alias">Iso:</label>
                        <input type="text" class="form-control" id="iso"  value="{{ $data['iso'] }}" placeholder="Enter iso" name="iso">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="sel1">Primary:</label>
                        <select class="form-control" name="primary" style="color: #000 !important; border: 1px solid #ccc !important;">
                            <option value="1" <?=$data['primary']== 1 ? "selected" : null?> >Set as a Primary</option>
                            <option value="0" <?=$data['primary']== 0 ? "selected" : null?> >Not Primary</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="form-group col-sm-10">
                            <input type="submit" id='send' class="btn btn-primary" name="send" value="Edit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
