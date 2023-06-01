@extends('layouts.front')
@section('content')
    <?$path = App\Models\Image::where('id','=',$article['image_id'])->first();?>
    <div class="breadcrumbs_area" style="background: #f9f9f9 url('<?='/public/frontCssJsFonts/assets/'.$path['path']?>') no-repeat center;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[29]['translation'],Config::get('currentLang')) ?></a></li>
                            <li><a href="#"><?=$translate::text($all_entities[2]['translation'],Config::get('currentLang')) ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-md-3 offset-lg-3 ">
                    <div class="account_form">
                        <h2><?=$translate::text($all_entities[2]['translation'],Config::get('currentLang')) ?></h2>
                        <form action="{{ route('postLogin') }}" method="post">
                            @if ($errors->any())
                                <p id="error-login" ><?=$translate::text($all_entities[72]['translation'],Config::get('currentLang')) ?></p>
                            @endif


                            <p>
                                <span id="errName"></span>
                                <input type="text" placeholder="<?=$translate::text($all_entities[48]['translation'],Config::get('currentLang')) ?>" name="email">
                            </p>
                            <p>
                                <span id="errPassword"></span>
                                <input type="password" name="password" placeholder="<?=$translate::text($all_entities[49]['translation'],Config::get('currentLang')) ?>">
                            </p>
                            <div class="login_submit">
                                    <a style="float: right" href='<?=Config::get('routeLang')?>/login/facebook'  class=" btn-soc btn fb-icon"><i class="ion-social-facebook"></i> <span class="f-g"></span><?=$translate::text($all_entities[69]['translation'],Config::get('currentLang')) ?></a>
                                    <a style="float: right" href='<?=Config::get('routeLang')?>/login/gmail'  class=" btn-soc btn gmail-icon"><i class="ion-social-googleplus-outline"></i> <span class="f-g"></span> <?=$translate::text($all_entities[70]['translation'],Config::get('currentLang')) ?></a>
                            </div>
                            {{csrf_field()}}
                            <div class="login_submit"  style="margin-top: 80px">
                                <p><a href="{{Config::get('routeLang')}}/forgotPassword" id="log-forgot" style="float: left"><?=$translate::text($all_entities[45]['translation'],Config::get('currentLang')) ?></a></p>
                                <p>
                                    <label for="remember">
                                        <input id="remember" name="remember" type="checkbox">
                                        <?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?>
                                    </label>
                                </p>
                                <button type="submit"><?=$translate::text($all_entities[2]['translation'],Config::get('currentLang')) ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
