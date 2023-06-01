@extends('layouts.back')
@section('content')

    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Add Article</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminArticlesAdd') }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="alias">Alias:</label>
                        <input type="text" class="form-control" id="alias" placeholder="Enter alias" name="alias">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="alias">Article types:</label>
                        <select class="form-control js-example-placeholder-single" name="type_id" style="color: #000 !important; border: 1px solid #ccc !important;">
                            @foreach($all_articletypes as $item)
                                <option value="{{ $item->id }}">{{ $translate::text($item->title,env('LANG_FOR_ADMIN_RU')) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container kv-main form-group col-sm-12">
                        <label for="alias">Upload Image:</label>
                        <br>
                        <input id="file-0a" class="file" type="file"  name="images[]"  multiple data-min-file-count="0">
                        <br>
                    </div>
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
                                                    <input type="text" class="form-control" id="title" placeholder="Enter title" value="" name="{{ $translate::translatable_key('title',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="desc" class = 'col-sm-0'>Description:</label>
                                                    <textarea class="form-control" id="desc"  name="{{ $translate::translatable_key('desc',$lang->iso) }}" placeholder = "Enter description"></textarea>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="meta_title">Meta Title:</label>
                                                    <input type="text" class="form-control" id="meta_title" placeholder="Enter MetaTitle" name="{{ $translate::translatable_key('meta_title',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="meta_key">Meta Keys:</label>
                                                    <input type="text" class="form-control" id="meta_key" placeholder="Enter MetaKeys" name="{{ $translate::translatable_key('meta_key',$lang->iso) }}">
                                                </div>

                                                <div class="form-group col-sm-8">
                                                    <label for="meta_desc" class = 'col-sm-0'>Meta Description:</label>
                                                    <textarea class="form-control" name="{{ $translate::translatable_key('meta_desc',$lang->iso) }}" id="meta_desc" placeholder="Enter MetaDescription"></textarea>
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    <input type="submit" id='send' class="btn btn-primary" name="send" value="Add">
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                CKEDITOR.replace("{{ $translate::translatable_key('desc',$lang->iso) }}");
                                            </script>
                                            @endforeach
                                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
