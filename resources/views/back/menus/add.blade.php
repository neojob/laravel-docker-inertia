@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Add Menu</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminMenusAdd') }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias"  value="{{ old('alias') }}" placeholder="Enter alias" name="alias">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="group_name">Group name:</label>
                        <input type="text" class="form-control" id="group_name"  value="{{ old('group_name') }}" placeholder="Enter group name" name="group_name">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="sort">Sort:</label>
                        <input type="text" class="form-control" id="sort"  value="{{ old('sort') }}" placeholder="Enter sort" name="sort">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="row">Row:</label>
                        <input type="text" class="form-control" id="row"  value="{{ old('row') }}" placeholder="Enter row" name="row">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="alias">Status:</label>
                        <select class="form-control" name="status" style="color: #000 !important; border: 1px solid #ccc !important;">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 tabs">
                        <ul class="nav nav-tabs">
                            @foreach($all_langs as $lang)
                                @if($lang->primary == 1)
                                    <li class="active"><a data-toggle="tab" href="#lang_{{ $lang->iso }}">{{ $lang->name }}</a></li>
                                @else
                                    <li><a data-toggle="tab" href="#lang_{{ $lang->iso }}">{{ $lang->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($all_langs as $lang)
                                @if($lang->primary == 1)
                                    <div id="lang_{{ $lang->iso }}" class="tab-pane fade in active">
                                @else
                                    <div id="lang_{{ $lang->iso }}" class="tab-pane fade">
                                @endif
                                        <div class="form-group col-sm-8">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{  $translate::text(old('title'),$lang->iso) }}" name="{{ $translate::translatable_key('title',$lang->iso) }}">
                                        </div>
                                    </div>
                            @endforeach
                                <div class="form-group col-sm-10">
                                    <input type="submit" id='send' class="btn btn-primary" name="send" value="Add">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
