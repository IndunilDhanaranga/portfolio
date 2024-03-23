<div class="card card-info">
    <div class="card-header">
        <div class="row">
            <div class="col-md-11">
                <div class="card-title" id="form_title">Project Details</div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="project_table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Project Type</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->ProjectTypeDetails->type }}</td>
                        <td>{{ $item->clientDetails->name }}</td>
                        <td><span
                                class="badge badge-{{ $item->ProjectStatusDetails->badge_class }}">{{ $item->ProjectStatusDetails->title }}</span>
                        </td>
                        <td>
                            <span class="ml-3" data-project = "{{ json_encode($item) }}"
                                onclick = "viewProject(this)"><i class="far fa-eye"></i></span>
                            <span class="ml-3" data-project = "{{ json_encode($item) }}"
                                onclick = "editProject(this)"><i class="far fa-edit"></i></span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="edit-project" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Project</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/update-project" method="post">
                <div class="modal-body">
                    @csrf
                    <input hidden type="text" name="id">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Project Type</label>
                                <select class="form-control select2 select2-hidden-accessible" name="type_id"
                                    style="width: 100%;" data-select2-id="1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($project_type as $item)
                                        <option value="{{ $item->id }}">{{ $item->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="2">
                                <label for="">Client</label>
                                <select class="form-control select2 select2-hidden-accessible" name="client_id"
                                    style="width: 100%;" data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($all_clients as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Estimate (Rs.)</label>
                                <input type="number" class="form-control" name="estimate" min="0"
                                    placeholder="Estimate">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Repository</label>
                                <input type="text" class="form-control" name="repository" min="0"
                                    placeholder="Repository">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Image</label>
                                </div>
                                <div class="col-12">
                                    <input type="file" id="" name="image[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="3">
                                <label for="">Project Status</label>
                                <select class="form-control select2 select2-hidden-accessible" name="status"
                                    style="width: 100%;" data-select2-id="3" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($project_status as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
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
<div class="modal fade" id="view-project" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6 id="client"></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 col-12">
                        <h6 id="project_type"></h6>
                    </div>
                    <div class="col-md-6 col-12">
                        <ul id="technologies">
                            
                        </ul>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-12">
                        <h6 id="estimate"></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-12">
                        <h6 id="description"></h6>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-12">
                        <h6 id="repository"></h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
