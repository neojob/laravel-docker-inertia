<?if($section['alias'] == 'books'):?>
    <ul>
        <?if($product['code'] != ''):?>
            <li><?=$translate::text($all_entities[156]['translation'],Config::get('currentLang'))?>: <?=$product['code']?></li>
        <?endif?>
        <?$authors = $product->authors?>
        <?if(count($authors) > 0):?>
            <li>
                <?foreach($authors as $item):?>
                    <a href="{{URL::to( Config::get('routeLang'))}}/author/<?=$item->alias?>"><?=$translate::text($item->title,Config::get('currentLang'))?></a>|
                <?endforeach?>
            </li>
        <?endif?>
        <?if($product['page_count']):?>
            <li><?=$translate::text($all_entities[158]['translation'],Config::get('currentLang'))?>: <?=$product['page_count']?></li>
        <?endif?>
        <?if($product['cover']):?>
            <li>
                <?if($product['cover'] == 1 ):?>
                    <?=$translate::text($all_entities[159]['translation'],Config::get('currentLang'))?>: <?=$translate::text($all_entities[181]['translation'],Config::get('currentLang'))?>
                <?elseif($product['cover'] == 2 ):?>
                    <?=$translate::text($all_entities[159]['translation'],Config::get('currentLang'))?>: <?=$translate::text($all_entities[182]['translation'],Config::get('currentLang'))?>
                <?else:?>
                    <?=$translate::text($all_entities[159]['translation'],Config::get('currentLang'))?>: <?=$translate::text($all_entities[183]['translation'],Config::get('currentLang'))?>
                <?endif?>
            </li>
        <?endif?>
        <?if($product['size']):?>
            <li><?=$translate::text($all_entities[160]['translation'],Config::get('currentLang'))?>: <?=$product['size']?></li>
        <?endif?>
        <?if($product['edition']):?>
            <li><?=$translate::text($all_entities[161]['translation'],Config::get('currentLang'))?>: <?=$product['edition']?></li>
        <?endif?>

        <?$languages = $product->languages?>
        <?if(count($languages) > 0):?>
            <li><?=$translate::text($all_entities[162]['translation'],Config::get('currentLang'))?>:
                <?foreach($languages as $item):?>
                    <?=$translate::text($item->title,Config::get('currentLang'))?>|
                <?endforeach?>
            </li>
        <?endif?>

        <?if($product['year']):?>
            <li><?=$translate::text($all_entities[163]['translation'],Config::get('currentLang'))?>: <?=$product['year']?></li>
        <?endif?>
        <?if($product['publish_id'] >= 0):?>
            <?$publish = \App\Models\Publish::where('id','=',$product['publish_id'])->first()?>
                <a href="{{URL::to( Config::get('routeLang'))}}/publish/<?=$publish['alias']?>"><?=$translate::text($publish['title'],Config::get('currentLang'))?></a>|
        <?endif?>
        <?if($product['condition_id']):?>
            <li>
                <?=$translate::text($all_entities[165]['translation'],Config::get('currentLang'))?>:
                <?$condition = \App\Models\Condition::where('id','=',$product['condition_id'])->first()?>
                <?=$translate::text($condition['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
    </ul>
<?elseif($section['alias'] == 'games'):?>
    <ul>
        <?if($product['code']):?>
            <li><?=$translate::text($all_entities[156]['translation'],Config::get('currentLang'))?>: <?=$product['code']?></li>
        <?endif?>


        <?if($product['producer_id']):?>
            <li><?=$translate::text($all_entities[166]['translation'],Config::get('currentLang'))?>:
                <?$producer = \App\Models\Producer::where('id','=',$product['producer_id'])->first()?>
                <?=$translate::text($producer['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>

        <?if($product['country_id']):?>
            <li><?=$translate::text($all_entities[167]['translation'],Config::get('currentLang'))?>:
                <?$country = \App\Models\Country::where('id','=',$product['country_id'])->first()?>
                <?=$translate::text($country['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?$languages = $product->languages?>
        <?if(count($languages) > 0):?>
            <li><?=$translate::text($all_entities[162]['translation'],Config::get('currentLang'))?>:
                <?foreach($languages as $item):?>
                    <?=$translate::text($item->title,Config::get('currentLang'))?>|
                <?endforeach?>
            </li>
        <?endif?>

        <?if($product['size']):?>
            <li><?=$translate::text($all_entities[160]['translation'],Config::get('currentLang'))?>: <?=$product['size']?></li>
        <?endif?>
        <?if($product['game_type']):?>
            <li><?=$translate::text($all_entities[168]['translation'],Config::get('currentLang'))?>:
                <?if($product['game_type'] == 1):?>
                    <?=$translate::text($all_entities[185]['translation'],Config::get('currentLang'))?>
                <?elseif($product['game_type'] == 2):?>
                    <?=$translate::text($all_entities[186]['translation'],Config::get('currentLang'))?>
                <?else:?>
                    <?=$translate::text($all_entities[187]['translation'],Config::get('currentLang'))?>
                <?endif?>
            </li>
        <?endif?>
        <?if($product['year']):?>
            <li><?=$translate::text($all_entities[163]['translation'],Config::get('currentLang'))?>: <?=$product['year']?></li>
        <?endif?>
        <?if($product['gamer_min_count']):?>
            <li><?=$translate::text($all_entities[169]['translation'],Config::get('currentLang'))?>: <?=$product['gamer_min_count']?></li>
        <?endif?>
        <?if($product['gamer_min_year']):?>
            <li><?=$translate::text($all_entities[170]['translation'],Config::get('currentLang'))?>: <?=$product['gamer_min_year']?></li>
        <?endif?>
    </ul>
<?elseif($section['alias'] == 'painting-supplies'):?>
    <ul>
        <?if($product['code']):?>
            <li><?=$translate::text($all_entities[156]['translation'],Config::get('currentLang'))?>: <?=$product['code']?></li>
        <?endif?>
        <?if($product['producer_id']):?>
            <li><?=$translate::text($all_entities[166]['translation'],Config::get('currentLang'))?>:
                <?$producer = \App\Models\Producer::where('id','=',$product['producer_id'])->first()?>
                <?=$translate::text($producer['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?if($product['country_id']):?>
            <li><?=$translate::text($all_entities[167]['translation'],Config::get('currentLang'))?>:
                <?$country = \App\Models\Country::where('id','=',$product['country_id'])->first()?>
                <?=$translate::text($country['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?if($product['x_piece']):?>
            <li><?=$translate::text($all_entities[171]['translation'],Config::get('currentLang'))?>: <?=$product['x_piece']?></li>
        <?endif?>
        <?if($product['edition']):?>
            <li><?=$translate::text($all_entities[160]['translation'],Config::get('currentLang'))?>: <?=$product['size']?></li>
        <?endif?>
        <?if($product['condition_id']):?>
            <li>
                <?=$translate::text($all_entities[165]['translation'],Config::get('currentLang'))?>:
                <?$condition = \App\Models\Condition::where('id','=',$product['condition_id'])->first()?>
                <?=$translate::text($condition['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?$colors = $product->colors?>
        <?if(count($colors) > 0):?>
            <li>
                <?=$translate::text($all_entities[172]['translation'],Config::get('currentLang'))?>:
                <?foreach($colors as $item):?>
                <?=$translate::text($item->title,Config::get('currentLang'))?>|
                <?endforeach?>
            </li>
        <?endif?>
        <?if($product['type']):?>
            <li><?=$translate::text($all_entities[173]['translation'],Config::get('currentLang'))?>: <?=$product['type']?></li>
        <?endif?>
        <?if($product['weight']):?>
            <li><?=$translate::text($all_entities[174]['translation'],Config::get('currentLang'))?>: <?=$product['weight']?></li>
        <?endif?>
        <?if($product['basis']):?>
            <li><?=$translate::text($all_entities[175]['translation'],Config::get('currentLang'))?>: <?=$product['basis']?></li>
        <?endif?>
        <?if($product['page_count']):?>
            <li><?=$translate::text($all_entities[158]['translation'],Config::get('currentLang'))?>: <?=$product['page_count']?></li>
        <?endif?>
        <?if($product['paper_thickness']):?>
            <li><?=$translate::text($all_entities[176]['translation'],Config::get('currentLang'))?>: <?=$product['paper_thickness']?></li>
        <?endif?>
        <?if($product['paper_color']):?>
            <li><?=$translate::text($all_entities[177]['translation'],Config::get('currentLang'))?>:
                <?$color = \App\Models\Color::where('id','=',$product['paper_color'])->first()?>
                <?=$translate::text($color['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?if($product['paper_type']):?>
            <li><?=$translate::text($all_entities[178]['translation'],Config::get('currentLang'))?>: <?=$product['paper_type']?></li>
        <?endif?>
        <?if($product['brush_number']):?>
            <li><?=$translate::text($all_entities[179]['translation'],Config::get('currentLang'))?>: <?=$product['brush_number']?></li>
        <?endif?>

        <?if($product['package_many']):?>
            <li><?=$translate::text($all_entities[188]['translation'],Config::get('currentLang'))?>:
                <?if($product['package_many'] == 1):?>
                    <?=$translate::text($all_entities[189]['translation'],Config::get('currentLang'))?>
                <?else:?>
                    <?=$translate::text($all_entities[190]['translation'],Config::get('currentLang'))?>
                <?endif?>
            </li>
        <?endif?>
    </ul>
<?elseif($section['alias'] == 'papers'):?>
    <ul>
        <?if($product['code']):?>
            <li><?=$translate::text($all_entities[156]['translation'],Config::get('currentLang'))?>: <?=$product['code']?></li>
        <?endif?>
        <?if($product['producer_id']):?>
            <li><?=$translate::text($all_entities[166]['translation'],Config::get('currentLang'))?>:
                <?$producer = \App\Models\Producer::where('id','=',$product['producer_id'])->first()?>
                <?=$translate::text($producer['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>
        <?if($product['country_id']):?>
            <li><?=$translate::text($all_entities[167]['translation'],Config::get('currentLang'))?>:
                <?$country = \App\Models\Country::where('id','=',$product['country_id'])->first()?>
                <?=$translate::text($country['title'],Config::get('currentLang'))?>
            </li>
        <?endif?>

        <?if($product['size']):?>
            <li><?=$translate::text($all_entities[160]['translation'],Config::get('currentLang'))?>: <?=$product['size']?></li>
        <?endif?>
        <?$colors = $product->colors?>
        <?if(count($colors) > 0):?>
            <li>
                <?=$translate::text($all_entities[172]['translation'],Config::get('currentLang'))?>:
                <?foreach($colors as $item):?>
                <?=$translate::text($item->title,Config::get('currentLang'))?>|
                <?endforeach?>
            </li>
        <?endif?>
        <?if($product['type']):?>
            <li><?=$translate::text($all_entities[173]['translation'],Config::get('currentLang'))?>: <?=$product['type']?></li>
        <?endif?>
        <?if($product['density']):?>
            <li><?=$translate::text($all_entities[180]['translation'],Config::get('currentLang'))?>: <?=$product['density']?></li>
        <?endif?>
    </ul>
<?endif?>