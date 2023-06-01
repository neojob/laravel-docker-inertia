@extends('layouts.front')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}/section/<?=$section['alias']?>"><?=$translate::text($section['title'],Config::get('currentLang'))?></a></li>
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}/category/<?=$category['alias']?>"><?=$translate::text($category['title'],Config::get('currentLang'))?></a></li>
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}/subCategory/<?=$subCategory['alias']?>"><?=$translate::text($subCategory['title'],Config::get('currentLang'))?></a></li>
                    <li class="breadcrumb-item active"><a href="#"><?=$translate::text($product['title'],Config::get('currentLang'))?></a></li>
                </ol>

            </div>
        </nav>
        <div class="page-content">
            <div class="container">
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    <img id="product-zoom"  style="width: 574px" src="/public/frontCssJsFonts/assets/<?=$main_image['path']?>" data-zoom-image="/public/frontCssJsFonts/assets/<?=$main_image['path']?>" alt="">
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <?foreach($images as $item):?>
                                        <a class="product-gallery-item" href="#" data-image="/public/frontCssJsFonts/assets/<?=$item->path?>" data-zoom-image="/public/frontCssJsFonts/assets/<?=$item->path?>">
                                            <img src="/public/frontCssJsFonts/assets/<?=$item->path?>" alt="">
                                        </a>
                                    <?endforeach?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title"><?=$translate::text($product['title'],Config::get('currentLang'))?></h1>
                                <div class="ratings-container">
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( <?=count($comments)?> <?=$translate::text($all_entities[22]['translation'],Config::get('currentLang'))?> )</a>
                                </div>
                                <div class="product-price">
                                    <?=$product['price']?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang'))?>
                                </div>
                                <div class="product-content">
                                    <?=$options?>
                                </div>

                                <div class="product-content" style="font-weight: 700">
                                    {!! $translate::text($product['desc'],Config::get('currentLang')) !!}
                                </div>
                                <div class="details-filter-row details-row-size">
                                    <label for="qty"><?=$translate::text($all_entities[109]['translation'],Config::get('currentLang'))?>:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="100" step="1" data-decimals="0" required>
                                    </div>
                                </div>
                                <div class="product-details-action">
                                    <a href="#" class="btn-product btn-cart " id="add_to_cart" data-id="<?=$product['id']?>">
                                        <span><?=$translate::text($all_entities[21]['translation'],Config::get('currentLang'))?></span>
                                    </a>
                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist add-to-wishlist prod-wish-btn" data-id="<?=$product['id']?>" title=""><span><?=$translate::text($all_entities[19]['translation'],Config::get('currentLang'))?></span></a>
                                    </div>
                                </div>
                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span><?=$translate::text($all_entities[110]['translation'],Config::get('currentLang'))?>:</span>
                                        <a href="{{URL::to( Config::get('routeLang'))}}/category/<?=$category['alias']?>"><?=$translate::text($category['title'],Config::get('currentLang'))?></a>
                                    </div>
                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label"><?=$translate::text($all_entities[111]['translation'],Config::get('currentLang'))?>:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false"><?=$translate::text($all_entities[22]['translation'],Config::get('currentLang'))?> (<?=count($comments)?>)</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade  show active" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container">
                                <div class="col-lg-6">
                                    <h2 class="title mb-1"><?//=$translate::text($article2['title'],Config::get('currentLang')) ?></h2>
                                    <p class="mb-2"><?//=strip_tags($translate::text($article2['desc'],Config::get('currentLang'))) ?></p>

                                    <p id="success-send" class="hide" style="color: green; font-weight: 500; "><?=$translate::text($all_entities[112]['translation'],Config::get('currentLang')) ?></p>
                                    <form action="#" method="POST" class="contact-form mb-3">
                                        <div class="row">
                                            <div class="col-sm-6 " >
                                                <input type="text" name="name" class="form-control" id="comment-name"  required placeholder="<?=$translate::text($all_entities[50]['translation'],Config::get('currentLang')) ?> *" >
                                                <span class="errName"></span>
                                            </div>
                                            {{ csrf_field() }}
                                            <input type="hidden" id="prod-id" value="<?=$product['id']?>"/>
                                            <div class="col-sm-6 " >
                                                <input type="text" name="email" class="form-control" id="email" placeholder="<?=$translate::text($all_entities[51]['translation'],Config::get('currentLang')) ?> *" >
                                                <span class="errEmail"></span>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <textarea class="form-control" cols="30" rows="4" name="message" id="message"  placeholder="<?=$translate::text($all_entities[113]['translation'],Config::get('currentLang')) ?> *"></textarea>
                                        <p class="errMessage"></p>
                                        <button type="button" id="sendComment" class="btn send-contact btn-outline-primary-2 btn-minwidth-sm">
                                            <span> <?=$translate::text($all_entities[79]['translation'],Config::get('currentLang')) ?></span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="container">
                                <div class="review">
                                    <?foreach($comments as $item):?>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><?=$item->name?></h4>
                                                <span class="review-date"><?=date('d-M-Y',strtotime($item->created_at))?></span>
                                            </div>
                                            <div class="col">
                                                <div class="review-content">
                                                    <p><?=$item->message?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h2 class="title text-center mb-4"  style="margin: 25px 0"><?=$translate::text($all_entities[107]['translation'],Config::get('currentLang'))?></h2>
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                     data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                    <?foreach($related_products as $item):?>
                        <div class="product product-7">
                            <figure class="product-media">
                                <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item->alias?>">
                                    <?$img = App\Models\Image::where('id','=',$item->image_id)->first()?>
                                    <img src="/public/frontCssJsFonts/assets/<?=$img['path']?>" alt="" class="product-image" style="width: 217px; margin: auto">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#"  data-id="<?=$item->id?>"  class="btn-product-icon btn-wishlist add-to-wishlist btn-expandable"><span><?=$translate::text($all_entities[19]['translation'],Config::get('currentLang'))?></span></a>
                                    <a href="popup/quickView.html"  data-id="<?=$item->id?>"  class="btn-product-icon btn-quickview" title=""><span><?=$translate::text($all_entities[20]['translation'],Config::get('currentLang'))?></span></a>
                                </div>
                                <div class="product-action">
                                    <a href="#"  data-id="<?=$item->id?>"  class="btn-product btn-cart add_to_cart"><span><?=$translate::text($all_entities[21]['translation'],Config::get('currentLang'))?></span></a>
                                </div>
                            </figure>

                            <div class="product-body">
                                <div class="product-cat">
                                    <?$section = \App\Http\Controllers\Front\Products::getProductCategory($item->id)?>
                                    <a href="{{URL::to( Config::get('routeLang'))}}/category/<?=$section->alias ? : ''?>">
                                        <?=$translate::text($section->title,Config::get('currentLang'))?>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item->alias?>"><?=$translate::text($item->title,Config::get('currentLang'))?></a></h3>
                                <div class="product-price">
                                    <?=$item->price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang'))?>
                                </div>
                                <div class="ratings-container">
                                    <span class="ratings-text">(
                                        <?$comments_count = \App\Models\Comment::where('status','=',1)->where('product_id','=',$item->id)->distinct()->count();
                                        echo $comments_count;
                                        ?>

                                        <?=$translate::text($all_entities[22]['translation'],Config::get('currentLang'))?> )</span>
                                </div>
                            </div>
                        </div>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </main>

@endsection
