<div class="card card-default color-palette-box">
    <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
            data-target="#add-bank-details">
            <i class="fa fa-plus"></i>
        </button>
    </div>
    <div class="card-body">
        <table id="bank_details" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Account Holder</th>
                    <th>Bank Name</th>
                    <th>Branch</th>
                    <th>Account No</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Created At</th>
                    @if (isPermissions('edit-bank-account'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($bank_details as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->account_holder }}</td>
                        <td>{{ $item->bank_name }}</td>
                        <td>{{ $item->branch }}</td>
                        <td>{{ $item->account_no }}</td>
                        <td>{{ number_format($item->balance, 2) }}</td>
                        @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        @if (isPermissions('edit-bank-account'))
                            <td>
                                <a data-bank_account = "{{ json_encode($item) }}" onclick = "editBankAccount(this)"><i
                                        class="far fa-edit"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="add-bank-details" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Bank Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/create-bank-account" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="holder_name">Holder Name</label>
                                <input type="text" class="form-control" id="holder_name" name="holder_name"
                                    placeholder="Account Holder">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Bank Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="branch">Branch</label>
                                <input type="text" class="form-control" id="branch" name="branch"
                                    placeholder="Branch">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="account_no">Account No</label>
                                <input type="number" class="form-control" id="account_no" name="account_no"
                                    placeholder="Account No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="balance">Initial Balance</label>
                                <input type="number" class="form-control" id="balance" name="balance"
                                    placeholder="Initial Balance">
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

<div class="modal fade" id="edit-bank-account" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Roll</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/edit-bank-account" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input hidden type="number" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="holder_name">Holder Name</label>
                                <input type="text" class="form-control" id="holder_name" name="holder_name"
                                    placeholder="Account Holder">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Bank Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="branch">Branch</label>
                                <input type="text" class="form-control" id="branch" name="branch"
                                    placeholder="Branch">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="account_no">Account No</label>
                                <input type="number" class="form-control" id="account_no" name="account_no"
                                    placeholder="Account No">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="balance">Initial Balance</label>
                                <input type="number" class="form-control" id="balance" name="balance"
                                    placeholder="Initial Balance">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-select2-id="1">
                        <label for="">Status</label>
                        <select class="form-control select2 " name="is_active" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
