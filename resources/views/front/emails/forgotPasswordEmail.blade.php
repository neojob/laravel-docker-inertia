@component('mail::message')
<?$all_entities = App\Models\Entity::all()?>
<?$lang = $data['lang'] == '' ? 'am' : $data['lang']?>
# <?=\App\Library\Translate::text($all_entities[85]['translation'],$lang)?>

<?=\App\Library\Translate::text($all_entities[86]['translation'],$lang)?>

<a href="{{env('APP_URL')}}<?=$data['lang']?>/reset/<?=$data['code']?>" ><?=\App\Library\Translate::text($all_entities[87]['translation'],$lang)?></a>
<?=\App\Library\Translate::text($all_entities[88]['translation'],$lang)?>,<br><br>
{{ config('app.name') }}
@endcomponent
