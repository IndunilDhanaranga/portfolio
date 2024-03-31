<div class="card">
    <div class="card-body">
        <form action="/portfolio-project-publish" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">Project Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Project</label>
                                <select class="form-control select2" onchange="projectID(this)" name="project_id" style="width: 100%;"
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
                                <label for="">Project Publication</label>
                                <select class="form-control select2 " name="is_publish" style="width: 100%;"
                                    data-select2-id="2" aria-hidden="true">
                                    <option value="">No Select</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h6>Publicated Project</h6>
    </div>
    <div class="card-body">
        <table id="publish_project_table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Project ID</th>
                    <th>Project Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        @if ($item->is_publish == 0)
                            <td><span class="badge badge-warning">Unpublish</span></td>
                        @else
                            <td><span class="badge badge-success">Publish</span></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
