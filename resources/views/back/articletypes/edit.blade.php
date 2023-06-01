@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Edit Article Type</h2>
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
                    <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminArticleTypesEdit',['id'=>$data['id']]) }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias"  value="{{ $data['alias'] }}" placeholder="Enter alias" name="alias">
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
                                                    <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{ $translate::text($data['title'],$lang->iso) }}" name="{{ $translate::translatable_key('title',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="desc" class = 'col-sm-0'>Description:</label>
                                                    <textarea class="form-control" id="desc" name="{{ $translate::translatable_key('desc',$lang->iso) }}" placeholder = "Enter description">{{  $translate::text($data['desc'],$lang->iso) }}</textarea>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="meta_title">Meta Title:</label>
                                                    <input type="text" class="form-control" id="meta_title"  placeholder="Enter MetaTitle" value="{{  $translate::text($data['meta_title'],$lang->iso) }}" name="{{ $translate::translatable_key('meta_title',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="meta_key">Meta Keys:</label>
                                                    <input type="text" class="form-control" id="meta_key" placeholder="Enter MetaKeys" value="{{  $translate::text($data['meta_key'],$lang->iso) }}" name="{{ $translate::translatable_key('meta_key',$lang->iso) }}">
                                                </div>

                                                <div class="form-group col-sm-8">
                                                    <label for="meta_desc" class = 'col-sm-0'>Meta Description:</label>
                                                    <textarea class="form-control"  name="{{ $translate::translatable_key('meta_desc',$lang->iso) }}" id="meta_desc" placeholder="Enter MetaDescription">{{  $translate::text($data['meta_desc'],$lang->iso) }}</textarea>
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
