@extends('layouts.back')
@section('content')

{{--    <ul id="breadcrumb">--}}
{{--        <li>--}}
{{--            <?php $all_types = App\Models\ArticleType::all();--}}
{{--            $type = Request::route()->parameter('type');--}}
{{--            ?>--}}
{{--            <label for="change_type" style="font-weight: normal">Filter by Type: </label>--}}
{{--            <select  id="change_type" style="border-radius: 2px; color: #000;padding: 5px 10px">--}}
{{--                <option value="">Select a Type</option>--}}
{{--                <?php foreach ($all_types as $item):?>--}}
{{--                <option value="<?=$item->id?>" <?php echo $type == $item->id ? 'selected' : ''?>><?php echo $translate::text($item->title,'en')?></option>--}}
{{--                <?php endforeach;?>--}}
{{--            </select>--}}
{{--        </li>--}}
{{--    </ul>--}}
    <div id="admin-content">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 id="admin-content-title">Article list</h2>
                </div>
                <div id="request">

                </div>
                @if (count($data) > 0)
                    <div class="content">
                        @include('back.articles.load')
                    </div>
                @else
                    <div class="content">
                        <div class="jumbotron text-center">
                            <h1>Empty Result</h1>
                        </div>
                    </div>
                @endif
                <div class="request">

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#change_type').on('change',function(){
                var type = $(this).val();
                window.location.href = '<?php echo Request::root()?>'+ '/admin/articles/list/' + type;
            });
        });
    </script>
@endsection
