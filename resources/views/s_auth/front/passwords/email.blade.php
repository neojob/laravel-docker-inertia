@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center"  style="margin-top: 150px; margin-bottom: 150px ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('forgotPassword') }}" >
                        <div class="form-group row">
                            <div class="col-md-6" style="margin: auto">
                                <span id="errEmail"></span>
                                <span id="success-send" class="hide"><?=$translate::text($all_entities[80]['translation'],Config::get('currentLang')) ?></span>
                                <input id="email"  type="text"  class="form-control " placeholder="<?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?>" name="email">
                                {{ csrf_field() }}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary send-link" style="background-color: #e63029; border: 1px solid #e63029">
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
