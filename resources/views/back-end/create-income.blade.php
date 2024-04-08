<form action="/create-income" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-title" id="form_title">Create Income</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group" data-select2-id="1">
                        <label for="">Income Type</label>
                        <select class="form-control select2 " name="type_id" style="width: 100%;" data-select2-id="1"
                            onchange="projectPicker(this)" aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($income_type as $item)
                                <option value="{{ $item->id }}">{{ $item->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-none" id="project_id">
                    <div class="form-group" data-select2-id="2">
                        <label for="">Project</label>
                        <select class="form-control select2" name="project_id" style="width: 100%;" data-select2-id="2"
                            aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($project as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group" data-select2-id="3">
                        <label for="">Bank Account</label>
                        <select class="form-control select2 " name="bank_account_id" style="width: 100%;" data-select2-id="3"
                            aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($bank_details as $item)
                                <option value="{{ $item->id }}">{{ $item->account_no }} - {{$item->account_holder}} - {{$item->bank_name}} - {{$item->branch}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Amount (Rs.)</label>
                        <input type="number" class="form-control" name="amount" min="0" placeholder="Amount">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Date</label>
                        <input type="date" class="form-control" name="date" placeholder="Date">
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
                            <input type="file" name="attachment[]" accept="image/*" multiple>
                        </div>
                    </div>
                </div>
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
