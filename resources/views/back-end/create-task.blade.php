<div class="card">
    <div class="card-body">
        <form action="/add-project" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title" id="form_title">Basic Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Project</label>
                                <select class="form-control select2 " name="project_id" style="width: 100%;"
                                    data-select2-id="1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($project as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="2">
                                <label for="">Task Category</label>
                                <select class="form-control select2 " name="task_category_id" style="width: 100%;"
                                    data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($task_category as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 mt-2">
                            <div class="from-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="">Time Allocated</label>
                                <div class="row">
                                    <div class="col-md-6 col-12 mt-2">
                                        <select class="form-control select2 " name="hours" style="width: 100%;"
                                            data-select2-id="3" aria-hidden="true">
                                            <option value="">Hours</option>
                                            @for ($i = 00; $i < 61; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12 mt-2">
                                        <select class="form-control select2 " name="min" style="width: 100%;"
                                            data-select2-id="4" aria-hidden="true">
                                            <option value="">Minutes</option>
                                            @for ($i = 00; $i < 61; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="from-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" placeholder="Description" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title" id="form_title">Additional Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="5">
                                <label for="">Developer</label>
                                <select class="form-control select2 " name="developer" style="width: 100%;"
                                    data-select2-id="5" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="">Attachments</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 div-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image[]" accept="image/*" >
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 mt-2">
                            <div class="form-group" data-select2-id="6">
                                <label for="">QA</label>
                                <select class="form-control select2 " name="task_category_id" style="width: 100%;"
                                    data-select2-id="6" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="7">
                                <label for="">Publisher</label>
                                <select class="form-control select2 " name="task_category_id" style="width: 100%;"
                                    data-select2-id="7" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

</div>
</div>
