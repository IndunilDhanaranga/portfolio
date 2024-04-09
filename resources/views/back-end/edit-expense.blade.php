<form action="/update-expense/{{$expense_details->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-title" id="form_title">Update Expense</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group" data-select2-id="1">
                        <label for="">Expense Type</label>
                        <select class="form-control select2 " name="type_id" style="width: 100%;" data-select2-id="1"
                            aria-hidden="true">
                            <option value="">No Select</option>
                            @foreach ($expense_type as $item)
                                <option value="{{ $item->id }}" {{$expense_details->expense_type_id == $item->id ? "selected" : ""}}>{{ $item->type }}</option>
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
                                <option value="{{ $item->id }}" {{$expense_details->bank_account_id == $item->id ? "selected" : ""}}>{{ $item->account_no }} -
                                    {{ $item->account_holder }} - {{ $item->bank_name }} - {{ $item->branch }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Amount (Rs.)</label>
                        <input type="number" class="form-control" name="amount" min="0" placeholder="Amount" value="{{$expense_details->amount}}">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="amount">Date</label>
                        <input type="date" class="form-control" name="date" placeholder="Date" value="{{$expense_details->date}}">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" rows="4">{{$expense_details->description}}</textarea>
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
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
</form>
</div>
