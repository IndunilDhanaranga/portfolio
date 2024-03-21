<div class="card card-default color-palette-box">
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add-user-roll">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div class="card-body">
        <table id="user_roll" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Roll</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_roll as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        <td>
                            <a data-user_roll="{{ json_encode($item) }}" onclick="editUserRoll(this)"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-user-roll" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User Roll</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-user-roll" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="user_roll">User Roll</label>
                        <input type="text" class="form-control" id="user_roll" name="user_roll"
                            placeholder="User Roll">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-user-roll" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Roll</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-user-roll" method="post">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="form-group">
                        <label for="user_roll">User Roll</label>
                        <input type="text" class="form-control" id="edit_user_roll" name="user_roll"
                            placeholder="User Roll">
                    </div>
                    <div class="form-group" data-select2-id="1">
                        <label for="is_active">Status</label>
                        <select class="form-control select2 select2-hidden-accessible" name="is_active"
                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
