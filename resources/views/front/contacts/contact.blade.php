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
            <div class="page-header page-header-big text-center"
                 <?$img = App\Models\Image::where('id','=',$article['image_id'])->first()?>
                 style="background-image: url('/public/frontCssJsFonts/assets/<?=$img['path']?>')"
                    >
                <h1 class="page-title text-white">
                    <?=$translate::text($article['title'],Config::get('currentLang')) ?>
                    <span class="text-white">{{ strip_tags($translate::text($article['desc'],Config::get('currentLang'))) }}</span>
                </h1>
            </div>
        </div>

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        <h2 class="title mb-1"><?=$translate::text($article1['title'],Config::get('currentLang')) ?></h2>
                        <p class="mb-3">
                            <?=strip_tags($translate::text($article1['desc'],Config::get('currentLang'))) ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <h3><?=$translate::text($all_entities[55]['translation'],Config::get('currentLang')) ?></h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-map-marker"></i>
                                            <?=$translate::text($all_entities[56]['translation'],Config::get('currentLang')) ?>
                                        </li>
                                        <li>
                                            <i class="icon-phone"></i>
                                            <a href="tel:{{ $translate::text(\App\Library\Settings::instance()->get_setting_val('mobileTel.Telephone'),Config::get('currentLang')) }}"><?=$translate::text($all_entities[42]['translation'],Config::get('currentLang')) ?></a>
                                        </li>
                                        <li>
                                            <i class="icon-envelope"></i>
                                            <a href="mailto:{{ $translate::text(\App\Library\Settings::instance()->get_setting_val('mobileEmail.Email'),Config::get('currentLang')) }}">{{ $translate::text(\App\Library\Settings::instance()->get_setting_val('mobileEmail.Email'),Config::get('currentLang')) }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="contact-info">
                                    <h3></h3>

                                    <ul class="contact-list">
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            <span class="text-dark"><?=$translate::text($all_entities[57]['translation'],Config::get('currentLang')) ?></span> <br><?=$translate::text($all_entities[59]['translation'],Config::get('currentLang')) ?>
                                        </li>
                                        <li>
                                            <i class="icon-calendar"></i>
                                            <span class="text-dark"><?=$translate::text($all_entities[58]['translation'],Config::get('currentLang')) ?></span> <br><?=$translate::text($all_entities[60]['translation'],Config::get('currentLang')) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title mb-1"><?=$translate::text($article2['title'],Config::get('currentLang')) ?></h2>
                        <p class="mb-2"><?=strip_tags($translate::text($article2['desc'],Config::get('currentLang'))) ?></p>

                        <p id="success-send" class="hide"><?=$translate::text($all_entities[49]['translation'],Config::get('currentLang')) ?></p>
                        <form action="#" method="POST" class="contact-form mb-3">
                            <div class="row">
                                <div class="col-sm-6 " >
                                    <input type="text" name="name" class="form-control" id="name" required placeholder="<?=$translate::text($all_entities[50]['translation'],Config::get('currentLang')) ?> *" >
                                    <span class="errName"></span>
                                </div>

                                <div class="col-sm-6 " >
                                    <input type="text" name="email" class="form-control" id="email" placeholder="<?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?> *" >
                                    <span class="errEmail"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 " >
                                    <input type="tel" name="pgone" class="form-control" id="phone" placeholder="<?=$translate::text($all_entities[52]['translation'],Config::get('currentLang')) ?> *">
                                    <span class="errPhone"></span>
                                </div>

                                <div class="col-sm-6 " >
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="<?=$translate::text($all_entities[53]['translation'],Config::get('currentLang')) ?> *">
                                    <span class="errSubject"></span>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <textarea class="form-control" cols="30" rows="4" name="message" id="message"  placeholder="Message<?=$translate::text($all_entities[8]['translation'],Config::get('currentLang')) ?> *"></textarea>
                            <p class="errMessage"></p>
                            <button type="button" id="sendmail" class="btn send-contact btn-outline-primary-2 btn-minwidth-sm">
                                <span><?=$translate::text($all_entities[54]['translation'],Config::get('currentLang')) ?></span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>

                    </div>
                </div>

                <hr class="mt-4 mb-5">

            </div>
            {{--<div id="map"></div>--}}
        </div>
    </main>


@endsection