<div class="card card-info">
    <div class="card-header">
        <div class="row">
            <div class="col-md-11">
                <div class="card-title" id="form_title">Client Details</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="project_client_table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_clients as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        <td>
                            <a data-user = "{{ json_encode($item) }}" onclick = "editUser(this)"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="edit-project-client" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/update-client" method="post">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" name="id">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Phone No">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Address</label>
                                <input type="address" class="form-control" name="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Status</label>
                                <select class="form-control select2 " name="is_active"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
