<form action="/update-income/{{ $income_details->id }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-title" id="form_title">Update Income</div>
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
                                <option value="{{ $item->id }}"
                                    {{ $income_details->income_type_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12 {{ $income_details->income_type_id == 2 ? '' : 'd-none' }}" id="project_id">
                    <div class="form-group" data-select2-id="2">
                        <label for="">Project</label>
                        <select class="form-control select2" name="project_id" style="width: 100%;" data-select2-id="2"
                            aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($project as $item)
                                <option value="{{ $item->id }}"
                                    {{ $income_details->income_type_id == 2 && $income_details->project_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group" data-select2-id="3">
                        <label for="">Bank Account</label>
                        <select class="form-control select2 " name="bank_account_id" style="width: 100%;"
                            data-select2-id="3" aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($bank_details as $item)
                                <option value="{{ $item->id }}"
                                    {{ $income_details->bank_account_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->account_no }} - {{ $item->account_holder }} - {{ $item->bank_name }} -
                                    {{ $item->branch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Amount (Rs.)</label>
                        <input type="number" class="form-control" name="amount" min="0" sub="0.00"
                            placeholder="Amount" value="{{ $income_details->amount }}">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Date</label>
                        <input type="date" class="form-control" name="date" placeholder="Date"
                            value="{{ $income_details->date }}">
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
                        <textarea class="form-control" name="description" placeholder="Description" rows="4">{{ $income_details->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
</form>
</div>
