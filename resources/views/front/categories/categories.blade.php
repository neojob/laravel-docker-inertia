@extends('layouts.front')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('/public/frontCssJsFonts/assets/img/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><?=$translate::text($category['title'],Config::get('currentLang'))?></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}"><?=$translate::text($all_entities[46]['translation'],Config::get('currentLang')) ?></a></li>
                    <li class="breadcrumb-item"><a href="{{URL::to( Config::get('routeLang'))}}/section/<?=$section['alias']?>"><?=$translate::text($section['title'],Config::get('currentLang'))?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$translate::text($category['title'],Config::get('currentLang'))?></li>
                </ol>
            </div>
        </nav>

        <div class="page-content category" data-category="<?=$category['id']?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="page_amount toolbox-info">
                                    <?if($products->total()>0):?>
                                        <p><?=$translate::text($all_entities[139]['translation'],Config::get('currentLang')) ?> <span id="start"><?=$start?></span>–<span id="end"><?=$last?></span> <?=$translate::text($all_entities[140]['translation'],Config::get('currentLang')) ?> <span id="total-count"><?=$products->total()?></span> </p>
                                    <?endif?>
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby"><?=$translate::text($all_entities[96]['translation'],Config::get('currentLang')) ?>:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option selected value="news"><?=$translate::text($all_entities[100]['translation'],Config::get('currentLang')) ?></option>
                                            <option value="best"><?=$translate::text($all_entities[97]['translation'],Config::get('currentLang')) ?></option>
                                            <option value="a-z"><?=$translate::text($all_entities[98]['translation'],Config::get('currentLang')) ?></option>
                                            <option value="z-a"><?=$translate::text($all_entities[99]['translation'],Config::get('currentLang')) ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            @include('front.categories.load')
                        </div>

                    </div>
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label><?=$translate::text($all_entities[103]['translation'],Config::get('currentLang'))?>:</label>
                                <a href="#" class="sidebar-filter-clear"><?=$translate::text($all_entities[101]['translation'],Config::get('currentLang'))?></a>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                        <?=$translate::text($all_entities[104]['translation'],Config::get('currentLang'))?>
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-1">
                                    <div class="widget-body">
                                        <div class="filter-items filter-items-count">
                                            <?foreach($categories  as $item):?>
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <a class="cat-links" href="{{URL::to( Config::get('routeLang'))}}/subCategory/<?=$item->alias?>"><?=$translate::text($item->title,Config::get('currentLang'))?></a>
                                                </div>
                                                <span class="item-count"><?=\App\Http\Controllers\Front\Categories::getSubCategoryProductsCount($item->id)?></span>
                                            </div>
                                            <?endforeach?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        <?if($section['id'] == 4):?>
                                            <?=$translate::text($all_entities[105]['translation'],Config::get('currentLang'))?>
                                        <?else:?>
                                            <?=$translate::text($all_entities[106]['translation'],Config::get('currentLang'))?>
                                        <?endif?>
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <?foreach($brands as $item):?>
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input brand" data-id="<?=$item->id?>"  id="brand-<?=$item->id?>">
                                                        <label class="custom-control-label"  data-id="<?=$item->id?>" for="brand-<?=$item->id?>"><?=$translate::text($item->title,Config::get('currentLang'))?></label>
                                                    </div>
                                                </div>
                                            <?endforeach?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
@endsection
