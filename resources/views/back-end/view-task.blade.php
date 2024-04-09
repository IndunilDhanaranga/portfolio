<div class="card">
    <div class="card-header">
        <h3 class="card-title">Task List</h3>
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
            <div class="col-md-2 col-sm-6 col-6">
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
            <div class="col-md-2 col-sm-6 col-6">
                <div class="form-group" data-select2-id="2">
                    <label for="">Task Status</label>
                    <select class="form-control select2 " id="status" style="width: 100%;" data-select2-id="2"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($task_status as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6">
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
            <div class="col-md-2 col-sm-6 col-6">
                <div class="form-group" data-select2-id="4">
                    <label for="">Developer</label>
                    <select class="form-control select2 " id="developer" style="width: 100%;" data-select2-id="4"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6">
                <div class="form-group" data-select2-id="5">
                    <label for="">QA</label>
                    <select class="form-control select2 " id="qa" style="width: 100%;" data-select2-id="5"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6">
                <div class="form-group" data-select2-id="6">
                    <label for="">Publisher</label>
                    <select class="form-control select2 " id="live" style="width: 100%;" data-select2-id="6"
                        aria-hidden="true">
                        <option value="">No Select</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <table id="task-list" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
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
                            Task Progress
                        </th>
                        <th>
                            Task Attachment
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        @if (isPermissions('edit-task'))
                            <th>
                                Action
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var is_permission = <?php echo isPermissions('edit-task') ? 'true' : 'false'; ?>;
</script>
