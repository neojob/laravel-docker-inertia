@extends('layouts.front')
@section('content')
    <main class="main">
        <?$img = App\Models\Image::where('id','=',$article['image_id'])->first()?>
        <div class="page-header text-center" style="background-image: url('/public/frontCssJsFonts/assets/<?=$img['path']?>')">
            <div class="container">
                <h1 class="page-title"><?=$translate::text($article['title'],Config::get('currentLang')) ?></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$translate::text($all_entities[122]['translation'],Config::get('currentLang')) ?></li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="cart">
                @if($report)
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">

                                    <div class="alert alert-danger">
                                        <strong><?=$translate::text($all_entities[191]['translation'],Config::get('currentLang')) ?>!</strong> <?=$translate::text($all_entities[192]['translation'],Config::get('currentLang'))?>
                                    </div>
                                <br/>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <?if(count($items) > 0):?>
                                <table class="table table-cart table-mobile" id="cart_summary">
                                    <thead>
                                        <tr>
                                            <th><?=$translate::text($all_entities[123]['translation'],Config::get('currentLang')) ?></th>
                                            <th><?=$translate::text($all_entities[193]['translation'],Config::get('currentLang')) ?></th>
                                            <th><?=$translate::text($all_entities[92]['translation'],Config::get('currentLang')) ?></th>
                                            <th><?=$translate::text($all_entities[124]['translation'],Config::get('currentLang')) ?></th>
                                            <th><?=$translate::text($all_entities[9]['translation'],Config::get('currentLang')) ?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?foreach($items as $item):?>
                                            <tr  data-id="<?=$item['id']?>" class="tr-<?=$item['id']?>">
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item['alias']?>">
                                                                <?$img = App\Models\Image::where('id','=',$item['image'])->first()?>
                                                                <img style="width: 40px; height: 40px"  src="/public/frontCssJsFonts/assets/<?=$img['path']?>" alt="">
                                                            </a>
                                                        </figure>
                                                        <h3 class="product-title">
                                                            <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item['alias']?>"><?=$translate::text($item['title'],Config::get('currentLang')) ?></a>
                                                        </h3>
                                                    </div>
                                                </td>
                                                <?$product = \App\Models\Product::where('id','=',$item['id'])->first()?>
                                                <td class="price-col t-c"  ><?=$product->discount == 0 ? '-' : $product->discount.'%'?></td>
                                                <td class="price-col"><?=$item['price']?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?> </td>
                                                <td class="quantity-col">
                                                    <div class="cart-product-quantity">
                                                        <div class="input-group  input-spinner">
                                                            <div class="input-group-prepend">
                                                                <button style="min-width: 26px" class="btn btn-decrement btn-spinner dec" type="button"><i class="icon-minus"></i></button>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <input type="text" style="text-align: center" class="form-control qty" value="<?=$item['count']?>" readonly required="" placeholder="">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button style="min-width: 26px" class="btn btn-increment btn-spinner inc" type="button"><i class="icon-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-col"><?=$item['price']*$item['count']?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?> </td>
                                                <td class="remove-col"><button class="btn-remove remove_item-td"><i class="icon-close"></i></button></td>
                                            </tr>
                                        <?endforeach?>
                                    </tbody>
                                </table>

                                <table class="table table-cart table-mobile pack-table" style="margin-top: 100px; border-top: 1px solid #ff0000" id="cart_summary">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%; font-weight: 700"><?=$translate::text($all_entities[90]['translation'],Config::get('currentLang')) ?></th>
                                            <th style="width: 20%; font-weight: 700"><?=$translate::text($all_entities[148]['translation'],Config::get('currentLang')) ?></th>
                                            <th style="width: 25%; font-weight: 700"><?=$translate::text($all_entities[149]['translation'],Config::get('currentLang')) ?></th>
                                            <th style="width: 30%; font-weight: 700"><?=$translate::text($all_entities[118]['translation'],Config::get('currentLang')) ?></th>
                                            <th style="width: 5%; font-weight: 700"><?=$translate::text($all_entities[95]['translation'],Config::get('currentLang')) ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr  data-id="" class="tr-package  hide" id="hide">
                                            <td class="img" style="width: 20%">
                                                <?$package = \App\Models\Packaging::where('status','=',1)->first()?>
                                                <img src="/public/frontCssJsFonts/assets/<?=$package->path?>" alt=""/>
                                            </td>
                                            <td class="" style="width: 20%">
                                                <div class="select-custom" style="width:100%">
                                                    <select class="package form-control">
                                                        <?$packagings = \App\Models\Packaging::where('status','=',1)->get()?>
                                                        <?foreach($packagings as $i):?>
                                                            <option value="{{$i->id}}" data-image="/public/frontCssJsFonts/assets/<?=$i->path?>" data-alias="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$i->alias?>">{{ \App\Library\Translate::text($i->title,Config::get('currentLang')) }}</option>
                                                        <?endforeach?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="" style="width: 25%;padding-left: 10px;">
                                                <?$package = \App\Models\Packaging::where('status','=',1)->first()?>
                                                <a href="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$package['alias']?>" class="package alias" >{{ \App\Library\Translate::text($package['title'],Config::get('currentLang')) }}</a>
                                            </td>
                                            <td class="" style="width: 30%">
                                                <select class="selectToElement" name="products[]" multiple="multiple">

                                                </select>
                                            </td>
                                            <td  style="width: 5%">
                                                <button class="btn-remove remove-packaging"><i class="icon-close"></i></button>
                                            </td>
                                        </tr>
                                    <?if(isset($packagingsSess) and count($packagingsSess) > 0):?>
                                        <?foreach($packagingsSess as $pack):?>

                                            <tr  data-id="" class="tr-package">
                <td class="img" style="width: 20%">
                    <?$package = \App\Models\Packaging::where('status','=',1)->first()?>
                    <img  src="/public/frontCssJsFonts/assets/<?=$package->path?>" alt=""/>
                </td>
                                                <td class="" style="width: 20%">
                                                    <div class="select-custom" style="width:100%">
                                                        <select class="package form-control">
                                                            <?$packagings = \App\Models\Packaging::where('status','=',1)->get()?>
                                                            <?foreach($packagings as $i):?>
                                                                <option <?=$pack['package'] == $i->id ? 'selected' : null?> value="{{$i->id}}"  data-image="/public/frontCssJsFonts/assets/<?=$i->path?>"  data-alias="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$i->alias?>">{{ \App\Library\Translate::text($i->title,Config::get('currentLang')) }}</option>
                                                            <?endforeach?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="" style="width: 25%;padding-left: 10px;">
                                                    <?$package = \App\Models\Packaging::where('status','=',1)->where('id','=',$pack['package'])->first()?>
                                                    <a href="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$package['alias']?>" class="package  alias" data-id="">{{ \App\Library\Translate::text($package['title'],Config::get('currentLang')) }}</a>
                                                </td>
                                                <td class="" style="width: 30%">
                                                    <select class="js-example-basic-multiple selectToElement" name="products[]" multiple="multiple">
                                                        <?foreach($items as $j):?>
                                                            <option  <?=in_array($j['id'],$pack['products']) ? 'selected' : null?>
                                                                    value="{{$j['id']}}">{{ \App\Library\Translate::text($j['title'],Config::get('currentLang')) }}</option>
                                                        <?endforeach?>
                                                    </select>
                                                </td>
                                                <td  style="width: 5%">
                                                    <button class="btn-remove remove-packaging"><i class="icon-close"></i></button>
                                                </td>
                                            </tr>

                                        <?endforeach?>
                                    <?else:?>
                                        <tr  data-id="" class="tr-package ">
        <td class="img" style="width: 20%">
            <?$package = \App\Models\Packaging::where('status','=',1)->first()?>
            <img  src="/public/frontCssJsFonts/assets/<?=$package->path?>" alt=""/>
        </td>
                                            <td class="" style="width: 20%">
                                                <div class="select-custom" style="width:100%">
                                                    <select class="package form-control">
                                                        <?$packagings = \App\Models\Packaging::where('status','=',1)->get()?>
                                                        <?foreach($packagings as $i):?>
                                                            <option value="{{$i->id}}"  data-image="/public/frontCssJsFonts/assets/<?=$i->path?>"  data-alias="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$i->alias?>">{{ \App\Library\Translate::text($i->title,Config::get('currentLang')) }}</option>
                                                        <?endforeach?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="" style="width: 25%;padding-left: 10px;">
                                                <?$package = \App\Models\Packaging::where('status','=',1)->first()?>
                                                <a href="{{URL::to( Config::get('routeLang'))}}/packaging/<?=$package['alias']?>" class="package  alias" data-id="">{{ \App\Library\Translate::text($package['title'],Config::get('currentLang')) }}</a>
                                            </td>
                                            <td class="" style="width: 30%">
                                                <select class="js-example-basic-multiple selectToElement" name="products[]" multiple="multiple">
                                                    <?foreach($items as $j):?>
                                                        <option value="{{$j['id']}}">{{ \App\Library\Translate::text($j['title'],Config::get('currentLang')) }}</option>
                                                    <?endforeach?>
                                                </select>
                                            </td>
                                            <td  style="width: 5%">
                                                <button class="btn-remove remove-packaging"><i class="icon-close"></i></button>
                                            </td>
                                        </tr>
                                    <?endif?>

                                    </tbody>
                                </table>
                                <div>
                                    <a href="#" class="add-packaging ">+<?=$translate::text($all_entities[150]['translation'],Config::get('currentLang')) ?></a>
                                    <p id="pack-save" class="hide"><?=$translate::text($all_entities[155]['translation'],Config::get('currentLang')) ?></p>
                                </div>
                                <div>
                                    <a href="#" class="save-packaging btn btn-primary"><?=$translate::text($all_entities[152]['translation'],Config::get('currentLang')) ?></a>
                                </div>

                            <?else:?>
                                <p id="cart-empty"><?=$translate::text($all_entities[138]['translation'],Config::get('currentLang')) ?></p>
                            <?endif?>
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title"><?=$translate::text($all_entities[127]['translation'],Config::get('currentLang')) ?></h3>

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-total">
                                        <td><?=$translate::text($all_entities[9]['translation'],Config::get('currentLang')) ?>:</td>
                                        <td class="sum-price"><?=$total_price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="{{URL::to( Config::get('routeLang'))}}/checkout" class="btn btn-outline-primary-2 btn-order btn-block"><?=$translate::text($all_entities[125]['translation'],Config::get('currentLang')) ?></a>
                            </div>
                            <a href="{{URL::to( Config::get('routeLang'))}}" class="btn btn-outline-dark-2 btn-block mb-3"><span><?=$translate::text($all_entities[126]['translation'],Config::get('currentLang')) ?></span><i class="icon-refresh"></i></a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
