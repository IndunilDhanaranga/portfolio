<div class="card">
    <div class="card-header">
        <h3 class="card-title">Todo List</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body mt-2">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="form-group" data-select2-id="1">
                    <label for="">Project</label>
                    <select class="form-control select2 " id="project_id" style="width: 100%;" data-select2-id="1"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($project as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="form-group" data-select2-id="3">
                    <label for="">Task Category</label>
                    <select class="form-control select2 " id="task_category_id" style="width: 100%;" data-select2-id="3"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($task_category as $item)
                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Stages</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="status_btn">
                        <button onclick="statusChanger(this)" id="dev" value="1"
                            class="btn btn-light">Developing</button>
                        <button onclick="statusChanger(this)" id="issue" value="2"
                            class="btn btn-light">Issue</button>
                        <button onclick="statusChanger(this)" id="qa" value="3" class="btn btn-light">QA
                            Test</button>
                        <button onclick="statusChanger(this)" id="live" value="4" class="btn btn-light">Live
                            Publish</button>
                        <button onclick="statusChanger(this)" id="completed" value="5"
                            class="btn btn-light">Completed</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <table id="todo-list" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th>
                            ID
                        </th> --}}
                        <th>
                            Project
                        </th>
                        <th>
                            Task Name
                        </th>
                        <th>
                            Task Category
                        </th>
                        <th>
                            Team Members
                        </th>
                        <th>
                            Remaining
                        </th>
                        <th>
                            Task Attachment
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>
