<form action="/add-project" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-title" id="form_title">Add Project</div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                        <select class="form-control select2 " name="type_id"
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
                        <select class="form-control select2 " name="client_id"
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
                        <input type="number" class="form-control" name="estimate" min="0" placeholder="Estimate">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Repository</label>
                        <input type="text" class="form-control" name="repository" min="0" placeholder="Repository">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="">Image</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 div-12">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image[]" >
                                    <label class="custom-file-label">Choose
                                        file</label>
                                </div>
                            </div>
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
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
</form>
</div>
