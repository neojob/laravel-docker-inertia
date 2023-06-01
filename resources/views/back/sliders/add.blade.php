@extends('layouts.back')
@section('content')

    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Add Slider</h2>
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="jumbotron col-sm-12">
                <form role='form' method="post" enctype="multipart/form-data" class="col-sm-12" action="{{ route('postAdminSlidersAdd') }}">
                    {{ csrf_field() }}

                    <div class="form-group col-sm-8">
                        <label for="alias">Link href:</label>
                        <input type="text" class="form-control" id="Link href" placeholder="Enter Link href" name="link_href">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="sort">Sort:</label>
                        <input type="text" class="form-control" id="Sort" placeholder="Enter Sort" name="sort">
                    </div>
                    <div class="container form-group col-sm-12">
                        <label for="alias">Upload Image:</label>
                        <br>
                        <input type="file"  name="images[]" >
                        <br>
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
                                                    <label for="desc" class = 'col-sm-0'>Top text:</label>
                                                    <input type="text" class="form-control" id="title" placeholder="Enter desc" value="" name="{{ $translate::translatable_key('desc',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label for="link_title">Link Title:</label>
                                                    <input type="text" class="form-control" id="link_title" placeholder="Enter LinkTitle" name="{{ $translate::translatable_key('link_title',$lang->iso) }}">
                                                </div>
                                                <div class="form-group col-sm-10">
                                                    <input type="submit" id='send' class="btn btn-primary" name="send" value="Add">
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
