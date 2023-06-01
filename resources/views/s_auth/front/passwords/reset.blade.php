@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 150px; margin-bottom: 150px ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reset') }}">
                        <p id="success-reset" class="hide"><?=$translate::text($all_entities[83]['translation'],Config::get('currentLang')) ?></p>
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                             <div class="col-md-6" style="margin: auto">
                                 <span id="errEmail"></span>
                                <input id="email" type="email" class="form-control" placeholder="<?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?>"  name="email" >

                            </div>
                        </div>
                        <input type="hidden" id="code" value="<?=$alias?>"/>
                        <div class="form-group row">
                            <div class="col-md-6" style="margin: auto">
                                <span id="errPassword"></span>
                                <input id="password" type="password" class="form-control" placeholder="<?=$translate::text($all_entities[63]['translation'],Config::get('currentLang')) ?>" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6" style="margin: auto">
                                <span id="errPasswordConfirm"></span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="<?=$translate::text($all_entities[76]['translation'],Config::get('currentLang')) ?>" name="password_confirmation">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group row mb-0">
                            <div class="col-md-12" style="text-align: center">
                                <button type="button" class="btn btn-primary reset-password" style="background-color: #e63029; border: 1px solid #e63029">
                                    <?=$translate::text($all_entities[79]['translation'],Config::get('currentLang')) ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
