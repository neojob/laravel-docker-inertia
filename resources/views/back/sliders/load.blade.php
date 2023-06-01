<div class="panel-body" id="load"  style="position: relative;">
    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Link title</th>
            <th>Link href</th>
            <th>Sort</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $translate::text($item->title,env('LANG_FOR_ADMIN_RU')) }}</td>
                <td>{{ $translate::text($item->desc,env('LANG_FOR_ADMIN_RU')) }}</td>
                <td><?=$translate::text($item->link_title,env('LANG_FOR_ADMIN_RU'))?></td>
                <td><?=$item->link_href?></td>
                <td>{{ $item->sort }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('adminSlidersEdit',['id'=>$item->id]) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('adminSlidersDelete',['id'=>$item->id]) }}"><i class="fa fa-times"></i> Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-numbers-list">{{ $data->links() }}</div>
</div>
