<div class="card" id="edit_project_type">
    <div class="card-body">
        <form action="/add-project-type" method="post" id="form_project_type">
            @csrf
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title" id="form_title">Add Project Types</div>
                        </div>
                        {{-- <div class="col-md-1">
                            <span class="btn btn-warning btn-xs" onclick="addSkills()"><i class="fa fa-plus"></i></span>
                            <span class="btn btn-warning btn-xs" id="remove" onclick="removeSkills()"><i class="fa fa-minus"></i></span>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="project_type">Project Type</label>
                                <input type="text" class="form-control" name="project_type" id="project_type"
                                    placeholder="Project Type">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="technologies">Technologies</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <span class="btn btn-primary btn-xs" onclick="addTechnology()"><i
                                                    class="fa fa-plus"></i></span>
                                            <span class="btn btn-primary btn-xs d-none" id="remove"
                                                onclick="removeTechnology()"><i class="fa fa-minus"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="technologies[]" id="technologies"
                                    placeholder="Technology">
                                <div id="additional_technology">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
        <div class="card card-default">
            <div class="card-body">
                <table id="project_type_table" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Project Type</th>
                            <th>Technologies</th>
                            @if (isPermissions('update-project-type'))
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_type as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <ul> <!-- Assuming you want to display technologies as an unordered list -->
                                        @foreach ($item->TechnologyDetails as $data)
                                            <li>{{ $data->technology }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                @if (isPermissions('update-project-type'))
                                    <td>
                                        <a href="#edit_project_type" data-project_type="{{ $item }}"
                                            onclick="editProjectType(this)"><i class="far fa-edit"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
