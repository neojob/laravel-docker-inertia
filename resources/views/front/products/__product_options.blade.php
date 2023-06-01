
<?if($section['alias'] == 'books'):?>
    <ul>
        <li>Կոդ: <?=$product['code']?></li>
        <li>Հեղինակ: <?//=$product['']?></li>
        <li>Էջերի քանակը: <?=$product['page_count']?></li>
        <li>Կազմ: <?//=$product['']?></li>
        <li>Չափեր: <?=$product['size']?></li>
        <li>Տպաքանակ: <?=$product['edition']?></li>
        <li>Լեզու: <?//=$product['']?></li>
        <li>Տարի: <?=$product['year']?></li>
        <li>Հրատարակչություն: <?//=$product['']?></li>
        <li>Վիչակը: <?//=$product['']?></li>
    </ul>
<?elseif($section['alias'] == 'games'):?>
    <ul>
        <li>Կոդ: <?=$product['code']?></li>
        <li>Արտադրող: <?//=$product['']?></li>
        <li>Արտադրման երկիր: <?//=$product['']?></li>
        <li>Լեզուն: <?//=$product['']?></li>
        <li>Չափեր: <?=$product['size']?></li>
        <li>Խաղի տեսակը՝ (Ինտելեկտուալ, ժամանցային, զարգացնող): <?//=$product['']?></li>
        <li>Տարի: <?=$product['year']?></li>
        <li>Մասնակիցների նվազագույն քանակը: <?=$product['gamer_min_count']?></li>
        <li>Մասնակիցների նվազագույն տարիքը: <?=$product['gamer_min_year']?></li>
    </ul>
<?elseif($section['alias'] == 'painting-supplies'):?>
    <ul>
        <li>Կոդ: <?=$product['code']?></li>
        <li>Արտադրող: <?//=$product['']?></li>
        <li>Արտադրման երկիր: <?//=$product['']?></li>
        <li>Ներառում է նկարչական պարագաներ՝ X կտոր: <?=$product['x_piece']?></li>
        <li>Չափեր: <?=$product['size']?></li>

        <li>Վիճակը: <?//=$product['']?></li>
        <li>Գույնը: <?//=$product['']?></li>
        <li>Տեսակը: <?=$product['type']?></li>

        <li>Ծավալը/Քաշը: <?=$product['weight']?></li>
        <li>Հիմքը: <?=$product['basis']?></li>
        <li>Էջերի քանակը: <?=$product['page_count']?></li>
        <li>Թղթի հաստությունը: <?=$product['paper_thickness']?></li>
        <li>Թղթի գույնը: <?//=$product['']?></li>
        <li>Թղթի տեսակը: <?=$product['paper_type']?></li>
        <li>Վրձինի համարը: <?=$product['brush_number']?></li>
    </ul>
<?elseif($section['alias'] == 'papers'):?>
    <ul>
        <li>Կոդ: <?=$product['code']?></li>
        <li>Արտադրող: <?//=$product['']?></li>
        <li>Արտադրման երկիր: <?//=$product['']?></li>
        <li>Չափեր: <?=$product['size']?></li>
        <li>Գույնը: <?//=$product['']?></li>
        <li>Տեսակը: <?=$product['type']?></li>
        <li>Խտությունը: <?=$product['density']?></li>
    </ul>
<?endif?>




