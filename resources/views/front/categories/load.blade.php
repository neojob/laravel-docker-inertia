<span class="start hide"><?=$start?></span>
<span class="end hide"><?=$last?></span>
<span class="total_count hide"><?=$count?></span>
<?if(count($products) > 0):?>
<div class="products mb-3">
    <div class="row justify-content-center">
        <?foreach($products as $item):?>
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product product-7 text-center">
                <figure class="product-media">
                    <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item->alias?>">
                        <?$img = App\Models\Image::where('id','=',$item->image_id)->first()?>
                        <img src="/public/frontCssJsFonts/assets/<?=$img['path']?>" alt="" class="product-image" style="width: 277px">
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
                        <?$section = \App\Http\Controllers\Front\Products::getProductSection($item->id)?>
                        <a href="{{URL::to( Config::get('routeLang'))}}/section/<?=$section->alias?>">
                            <?=$translate::text($section->title,Config::get('currentLang'))?>
                        </a>
                    </div>
                    <h3 class="product-title">
                        <a href="{{URL::to( Config::get('routeLang'))}}/product/<?=$item->alias?>"><?=$translate::text($item->title,Config::get('currentLang'))?></a></h3>
                    <div class="product-price">
                        <?=$item->price?> <?=$translate::text($all_entities[23]['translation'],Config::get('currentLang'))?>
                    </div>
                    <div class="ratings-container">
                        <span class="ratings-text">( <?=isset($item->comments) ? count($item->comments) : 0?> <?=$translate::text($all_entities[22]['translation'],Config::get('currentLang'))?>)</span>
                    </div>
                </div>
            </div>
        </div>

        <?endforeach?>

    </div>
</div>

<nav aria-label="Page navigation section-pagin">
    {{ $products->links('vendor.pagination.main') }}
</nav>
<?endif?>