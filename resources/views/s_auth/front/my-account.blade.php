@extends('layouts.front')
@section('content')
    <main class="main">
        <?$img = \App\Models\Image::where('id','=',$article['image_id'])->first()?>
        <div class="page-header text-center" style="background-image: url('/public/frontCssJsFonts/assets/<?=$img['path']?>')">
            <div class="container">
                <h1 class="page-title"><?=$translate::text($all_entities[14]['translation'],Config::get('currentLang')) ?></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$translate::text($all_entities[14]['translation'],Config::get('currentLang')) ?></li>
                </ol>
            </div>
        </nav>
        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true"><?=$translate::text($all_entities[114]['translation'],Config::get('currentLang'))?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false"><?=$translate::text($all_entities[115]['translation'],Config::get('currentLang'))?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false"><?=$translate::text($all_entities[116]['translation'],Config::get('currentLang'))?></a>
                                </li>
                            </ul>
                        </aside>

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                    {!! $translate::text($article['desc'],Config::get('currentLang')) !!}
                                </div>
                                <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                    <?if(count($orders) > 0):?>
                                        <table class="table resp-table">
                                            <thead>
                                                <tr>
                                                    <th><?=$translate::text($all_entities[118]['translation'],Config::get('currentLang')) ?></th>
                                                    <th><?=$translate::text($all_entities[92]['translation'],Config::get('currentLang')) ?></th>
                                                    <th><?=$translate::text($all_entities[116]['translation'],Config::get('currentLang')) ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?foreach($orders as $item):?>
                                                    <tr>
                                                        <td><?=$item->id?></td>
                                                        <td><?=$item->price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang')) ?></td>
                                                        <td>
                                                            <?$order_products = $item->products?>
                                                            <?foreach($order_products as $item):?>
                                                                <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item->alias?>"><?=$translate::text($item['title'],Config::get('currentLang')) ?>*<?=$item->product_count?></a>&nbsp;
                                                            <?endforeach?>
                                                        </td>
                                                    </tr>
                                                <?endforeach?>
                                            </tbody>
                                        </table>
                                    <?else:?>
                                        <p style="color: red"><?=$translate::text($all_entities[119]['translation'],Config::get('currentLang')) ?></p>
                                    <?endif?>
                                </div>

                                <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                    <p class="hide" id="success-send"><?=$translate::text($all_entities[121]['translation'],Config::get('currentLang')) ?></p>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[68]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text" value="<?=$user->first_name?>" id="Fname"  class="form-control">
                                                <span class="errFirstName"></span>
                                            </div>

                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[69]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->last_name?>"  id="Lname"  class="form-control">
                                                <span class="errLastName"></span>
                                            </div>
                                        </div>
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[70]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->country?>"  id="country"  class="form-control">
                                                <span class="errCountry"></span>
                                            </div>

                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[71]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->region?>"  id="region"  class="form-control">
                                                <span class="errRegion"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[72]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->city?>"  id="city"  class="form-control">
                                                <span class="errCity"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[73]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->street?>"  id="street"  class="form-control">
                                                <span class="errStreet"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[74]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->apartment?>"  id="apartment"  class="form-control">
                                                <span class="errApartment"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[75]['translation'],Config::get('currentLang')) ?> </label>
                                                <input type="text"  value="<?=$user->index?>"  id="index"  class="form-control">
                                                <span class="errIndex"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[52]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->phone?>"  id="phone"  class="form-control">
                                                <span class="errPhone"></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="text"  value="<?=$user->email?>"  id="email"  class="form-control">
                                                <span class="errEmail"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[63]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="password" class="form-control" id="password">
                                                <span class="errPassword"></span>
                                            </div>

                                            <div class="col-sm-6">
                                                <label><?=$translate::text($all_entities[76]['translation'],Config::get('currentLang')) ?> *</label>
                                                <input type="password" class="form-control" id="password-confirm">
                                                <span class="errPasswordConfirm"></span>
                                            </div>
                                        </div>
                                        <button type="button" id="saveChanges" class="btn btn-outline-primary-2">
                                            <span><?=$translate::text($all_entities[120]['translation'],Config::get('currentLang')) ?></span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
