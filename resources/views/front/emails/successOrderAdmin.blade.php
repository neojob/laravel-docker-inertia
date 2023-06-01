@component('mail::message')
# New order ID: {{ $data->id }}

<label><span style="font-size: 18px">ID:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->id }}</span></label><br><br>
<label><span style="font-size: 18px">First name:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->first_name }}</span></label><br><br>
<label><span style="font-size: 18px">Last name:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->last_name }}</span></label><br><br>
<label><span style="font-size: 18px">Company:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->company }}</span></label><br><br>
<label><span style="font-size: 18px">Email:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->email }}</span></label><br><br>
<label><span style="font-size: 18px">Phone:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->phone }}</span></label><br><br>
<label><span style="font-size: 18px">State:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->state }}</span></label><br><br>
<label><span style="font-size: 18px">City:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->city }}</span></label><br><br>
<label><span style="font-size: 18px">Street:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->street }}</span></label><br><br>
<label><span style="font-size: 18px">Apartment:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->apartment }}</span></label><br><br>
<label><span style="font-size: 18px">Index:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->index }}</span></label><br><br>
<label><span style="font-size: 18px">Notes:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->notes }}</span></label><br><br>

<label><span style="font-size: 18px">Payment type:</span><span  style="font-size: 20px; color: lightseagreen"> {{ $data->payment_type == 1 ? 'Cash' : 'Credit card' }}</span></label><br><br>
<label><span style="font-size: 18px">Total price:</span><span  style="font-size: 20px; color: red"> {{ $data->total_price }} amd</span></label><br><br>
<div class="form-group col-sm-8">
    <div class="container">
        <h2 style="color: lightcoral;">Order products list:</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Count</th>
                <th>Total price</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($orderProducts as $item):?>
                <tr>
                    <td>{{ $item->id }}</td>
                    <?$image = \App\Models\Image::where('id','=',$item->image_id)->first();?>
                    <td><img src="<?=env('APP_URL')?>/public/frontCssJsFonts/assets/<?=$image['path']?>" width="60" ></td>
                    <td>{{ $translate::text($item->title,'en') }}</td>
                    <td>{{ $item->price }} amd</td>
                    <td><?=$item->pivot->product_count?></td>
                    <td><?=$item->price*$item->pivot->product_count?> amd</td>
                </tr>
            <?endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<?$orderPackagings = \App\Models\OrderPackaging::where('order_id','=',$data->id)->get()?>
<?if(count($orderPackagings) > 0):?>
<div class="form-group col-sm-8">
    <div class="container">
        <h2 style="color: lightcoral;">Order Packaging list:</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Package</th>
                <th>Products</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($orderPackagings as $item):?>
            <?$package = \App\Models\Packaging::where('id','=',$item->package_id)->first()?>
            <tr>
                <td><a href="<?=Request::root()?>/packaging/<?=$package['alias']?>"><?=\App\Library\Translate::text($package['title'],'am')?></a></td>
                <td>
                    <?$products = \App\Models\OrderPackagingProduct::where('order_id','=',$data->id)->where('package_id','=',$item->package_id)->get()?>
                    <?foreach($products as $prod):?>
                    <?$product = \App\Models\Product::where('id','=',$prod->product_id)->first()?>
                    <a href="<?=Request::root()?>/product/<?=$product['alias']?>"><?=\App\Library\Translate::text($product['title'],'am')?></a> &nbsp;
                    <?endforeach?>
                </td>
            </tr>
            <?endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<?endif?>
@endcomponent
