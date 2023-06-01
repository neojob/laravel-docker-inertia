<div class="panel-body" id="load"  style="position: relative;">
    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Value</th>
            <th>Group</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $translate::text($item['value'],env('LANG_FOR_ADMIN_RU')) }}</td>
                <td>{{ $item->group }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('adminSettingsEdit',['id'=>$item->id]) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('adminSettingsDelete',['id'=>$item->id]) }}"><i class="fa fa-times"></i> Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-numbers-list">{{ $data->links() }}</div>
</div>
