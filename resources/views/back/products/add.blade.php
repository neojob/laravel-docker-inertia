@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Add product</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminProductsAdd') }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias"  value="{{ old('alias') }}" placeholder="Enter alias" name="alias">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="alias">Categories:</label>
                        <select class="form-control js-example-placeholder-single" name="category_id" style="color: #000 !important; border: 1px solid #ccc !important;">
                            @foreach($all_categories as $item)
                                <option value="{{ $item->id }}">{{ $translate::text($item->title,env('LANG_FOR_ADMIN_RU')) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" id="" style="color: #000 !important;">
                            <option value="1">Show</option>
                            <option value="0">Hide</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="container kv-main form-group col-sm-12">
                        <label for="alias">Upload image:</label>
                        <br>
                        <input id="file-0a" class="file" type="file"  name="images[]"  multiple data-min-file-count="0">
                        <br>
                    </div>
                    <br>
                    <br><br>
                    <br><br>
                    <div class="form-group col-sm-12 tabs">
                        <ul class="nav nav-tabs" id="tabs">
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
                                <div class="form-group col-sm-12">
                                    <label for="desc" class = 'col-sm-0'>Description:</label>
                                    <textarea class="form-control" id="desc" name="{{ $translate::translatable_key('desc',$lang->iso) }}" placeholder = "Enter description">{{  $translate::text(old('desc'),$lang->iso) }}</textarea>
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="meta_title">Meta title:</label>
                                    <input type="text" class="form-control" id="meta_title"  placeholder="Enter MetaTitle" value="{{  $translate::text(old('meta_title'),$lang->iso) }}" name="{{ $translate::translatable_key('meta_title',$lang->iso) }}">
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="meta_key">Meta key:</label>
                                    <input type="text" class="form-control" id="meta_key" placeholder="Enter MetaKeys" value="{{  $translate::text(old('meta_key'),$lang->iso) }}" name="{{ $translate::translatable_key('meta_key',$lang->iso) }}">
                                </div>

                                <div class="form-group col-sm-8">
                                    <label for="meta_desc" class = 'col-sm-0'>Meta description:</label>
                                    <textarea class="form-control"  name="{{ $translate::translatable_key('meta_desc',$lang->iso) }}" id="meta_desc" placeholder="Enter MetaDescription">{{  $translate::text(old('meta_key'),$lang->iso) }}</textarea>
                                </div>
                            </div>
                            <script type="text/javascript">
                                CKEDITOR.replace("{{ $translate::translatable_key('desc',$lang->iso) }}");
                            </script>
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
