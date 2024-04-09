<div class="card card-info">
    <div class="card-header">
        <div class="row">
            <div class="col-md-11">
                <div class="card-title">Category Info</div>
            </div>
            <div class="col-md-1">
                <span class="btn btn-warning btn-xs float-right" data-toggle="modal" data-target="#create-task-category"><i
                        class="fa fa-plus"></i></span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="task-category" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Status</th>
                    @if (isPermissions('update-task-category'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($task_category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category }}</td>
                        @if ($item->status == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        @if (isPermissions('update-task-category'))
                            <td>
                                <a data-task_category = "{{ json_encode($item) }}" onclick = "editTaskCategory(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="create-task-category" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Task Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-task-category" method="post">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" name="id">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="from-group">
                                <label for="">Task Category</label>
                                <input type="text" class="form-control" name="category" placeholder="Task Category">
                            </div>
                        </div>
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
<div class="modal fade" id="edit-task-category" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Task Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/update-task-category" method="post">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" name="id">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="from-group">
                                <label for="">Task Category</label>
                                <input type="text" class="form-control" name="category" placeholder="Task Category">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Status</label>
                                <select class="form-control select2 " name="status" style="width: 100%;"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
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
