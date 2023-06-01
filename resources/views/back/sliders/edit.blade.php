@extends('layouts.back')
@section('content')
    <div id="admin-content">
        <div class="container">
            <h2 id="admin-content-title">Edit Slider</h2>
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
                <form role='form' method="post"  data-id="{{ $data['id'] }}" enctype="multipart/form-data" class="col-sm-12 main-form" action="{{ route('postAdminSlidersEdit',['id'=>$data['id']]) }}">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-8">
                        <label for="link_href">Link href:</label>
                        <input type="text" class="form-control" id="link_href" value="{{ $data['link_href'] }}" placeholder="Enter link href" name="link_href">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="sort">Sort:</label>
                        <input type="text" class="form-control" id="sort" value="{{ $data['sort'] }}" placeholder="Enter sort" name="sort">
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="sort">Status:</label><br>
                        <select name="status" style="color: #000; border: 1px solid #000000; width: 150px;border-radius:2px ;">
                            <option value="0" <?=$data['status'] == 1 ? 'selected' :  null?>>hide</option>
                            <option value="1" <?=$data['status'] == 1 ? 'selected' :  null?>>show</option>
                        </select>
                    </div>
                    <div class="container form-group col-sm-12">
                        <label for="alias">Upload Image:</label>
                        <br>
                        <input type="file"  name="images[]" >
                        <br>
                    </div>
                    <?php if(!empty($data['path'])):?>
                        <img src="/frontCssJsFonts/assets/<?=$data['path']?>" width="400px" height="400px" alt="">
                    <?php endif?><br><br>
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
                                        <input type="text" class="form-control" id="title" placeholder="Enter desc" value="{{ $translate::text($data['desc'],$lang->iso) }}" name="{{ $translate::translatable_key('desc',$lang->iso) }}">
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <label for="link_title">Link Title:</label>
                                        <input type="text" class="form-control" id="link_title"  placeholder="Enter LinkTitle" value="{{  $translate::text($data['link_title'],$lang->iso) }}" name="{{ $translate::translatable_key('link_title',$lang->iso) }}">
                                    </div>
                                </div>
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
