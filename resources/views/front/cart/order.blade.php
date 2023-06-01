@extends('layouts.front')
@section('content')
    <main class="main">
        <?$img = App\Models\Image::where('id','=',$article['image_id'])->first()?>
        <div class="page-header text-center" style="background-image: url('/public/frontCssJsFonts/assets/<?=$img['path']?>')">
            <div class="container">
                <h1 class="page-title"><?=$translate::text($all_entities[8]['translation'],Config::get('currentLang')) ?></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$translate::text($all_entities[8]['translation'],Config::get('currentLang')) ?></li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <p id="success" class="hide"><?=$translate::text($all_entities[137]['translation'],Config::get('currentLang')) ?></p>
                    <form action="#" class="order-form">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[68]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='first_name' class="form-control" >
                                        <span id="error_first_name"></span>
                                    </div>

                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[69]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='last_name' class="form-control" >
                                        <span id="error_last_name"></span>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="email" id='email' class="form-control" >
                                        <span id="error_email"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[131]['translation'],Config::get('currentLang')) ?></label>
                                        <input type="text" id="company" class="form-control">
                                        <span id="error_company"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[71]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='state' class="form-control" >
                                        <span id="error_state"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[72]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id="city" class="form-control" >
                                        <span id="error_city"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[73]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='street' class="form-control" placeholder="" >
                                        <span id="error_street"></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[74]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='apartment' class="form-control" placeholder="" >
                                        <span id="error_apartment"></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[75]['translation'],Config::get('currentLang')) ?> </label>
                                        <input type="text" id="index" class="form-control" >
                                    </div>

                                    <div class="col-sm-6">
                                        <label><?=$translate::text($all_entities[52]['translation'],Config::get('currentLang')) ?>*</label>
                                        <input type="text" id='phone' class="form-control" >
                                        <span id="error_phone"></span>
                                    </div>
                                </div>



                                <label> <?=$translate::text($all_entities[132]['translation'],Config::get('currentLang')) ?></label>
                                <textarea  id="order_note"  class="form-control" cols="30" rows="4" placeholder=""></textarea>
                                <span id="error_note"></span>
                            </div>

                            <aside class="col-lg-3 order-info">
                                <div class="summary">
                                    <h3 class="summary-title"><?=$translate::text($all_entities[130]['translation'],Config::get('currentLang')) ?></h3>

                                    <table class="table table-summary ">
                                        <thead>
                                        <tr>
                                            <th><?=$translate::text($all_entities[123]['translation'],Config::get('currentLang')) ?></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($items as $item):?>
                                                <tr>
                                                    <td><a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item['alias']?>"><?=$translate::text($item['title'],Config::get('currentLang')) ?></a></td>
                                                    <td><?=$item['count']?>* <?=$item['price']?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                                </tr>
                                            <?endforeach?>
                                            <tr class="summary-subtotal">
                                                <td><?=$translate::text($all_entities[133]['translation'],Config::get('currentLang')) ?>:</td>
                                                <td><?=$items_price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                            </tr>
                                            <tr class="summary-subtotal">
                                                <td><?=$translate::text($all_entities[153]['translation'],Config::get('currentLang')) ?>:</td>
                                                <td><?=$packaging_price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td><?=$translate::text($all_entities[9]['translation'],Config::get('currentLang')) ?>:</td>
                                                <td><?=$items_price + $packaging_price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed payment-type" data-id="1" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                        <?=$translate::text($all_entities[134]['translation'],Config::get('currentLang')) ?>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapse-2" class="collapse hide" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed payment-type" data-id="2" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                        <?=$translate::text($all_entities[135]['translation'],Config::get('currentLang')) ?>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">

                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed payment-type" data-id="3" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                        <?=$translate::text($all_entities[136]['translation'],Config::get('currentLang')) ?>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">

                                            </div>
                                        </div>

                                    </div>

                                    <button type="button"  id="send_order" class="btn btn-outline-primary-2  btn-block">
                                        <span class="btn-text-order"><?=$translate::text($all_entities[129]['translation'],Config::get('currentLang')) ?></span>
                                    </button>
                                </div>
                            </aside>
                        </div>
                    </form>

                    <form action="/pay/go" id="go-to-amr" method="post">
                        <input type="hidden" name="OrderID" value="">
                    </form>
                    <form action="https://money.idram.am/payment.aspx" id="go-to-idram" method="POST">
                        <input type="hidden" name="EDP_LANGUAGE" value="AM">
                        <input type="hidden" name="EDP_REC_ACCOUNT" value="XXXX">
                        <input type="hidden" name="EDP_DESCRIPTION" value="Avon Payment via Idram">
                        <input type="hidden" name="EDP_AMOUNT" id="amount_i" value="">
                        <input type="hidden" name="EDP_BILL_NO" id="order_id_i" value="">
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection
