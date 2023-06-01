<div class="panel-body" id="load"  style="position: relative;">
    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Alias</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)

            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->alias }}</td>
                <td>{{ $translate::text($item->title,env('LANG_FOR_ADMIN_RU')) }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('adminCategoriesEdit',['id'=>$item->id]) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('adminCategoriesDelete',['id'=>$item->id]) }}"><i class="fa fa-times"></i> Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-numbers-list">{{ $data->links() }}</div>
</div>
