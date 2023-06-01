@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Edit Setting</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminSettingsEdit',['id'=>$data['id']]) }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name"  value="{{ $data['name']}}" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="group">Group:</label>
                        <input type="text" class="form-control" id="group"  value="{{ $data['group'] }}" placeholder="Enter group" name="group">
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
                                    <label for="value">Value:</label>
                                    <input type="text" class="form-control" id="value" placeholder="Enter value" value="{{  $translate::text($data['value'],$lang->iso) }}" name="{{ $translate::translatable_key('value',$lang->iso) }}">
                                </div>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace("{{ $translate::translatable_key('desc',$lang->iso) }}");
                                </script>
                            @endforeach
                                <div class="form-group col-sm-10">
                                    <input type="submit" id='send' class="btn btn-primary" name="send" value="Edit">
                                </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
