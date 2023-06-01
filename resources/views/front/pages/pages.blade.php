@extends('layouts.front')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$translate::text($article['title'],Config::get('currentLang')) ?></li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <?$img = App\Models\Image::where('id','=',$article['image_id'])->first()?>
            <div class="page-header page-header-big text-center" style='background-image: url("/public/frontCssJsFonts/assets/<?=$img['path']?>")'>
                <h1 class="page-title text-white"><?=$translate::text($article['title'],Config::get('currentLang')) ?></h1>
            </div>
        </div>

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-6 mb-lg-0">
                        {!! $translate::text($article['desc'],Config::get('currentLang')) !!}
                    </div>

                </div>

                <div class="mb-5"></div>
            </div>
        </div>
    </main>
@endsection
