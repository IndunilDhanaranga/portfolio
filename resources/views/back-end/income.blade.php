<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="income_types" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Project</th>
                    <th>Bank Account</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Attachments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($income as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>{{ $item->IncomeType->type }}</td>
                        <td>{{ $item->ProjectDetails ? $item->ProjectDetails->title : "" }}</td>
                        <td>{{ $item->BankDetails->account_no }} - {{ $item->BankDetails->account_holder }} -
                            {{ $item->BankDetails->bank_name }} - {{ $item->BankDetails->branch }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ number_format($item->amount, 2) }}</td>
                        <td>
                            @foreach ($item->AttachmentDetails as $value)
                                <a target="_blank" class="ml-2" href="{{ getUploadAttachment($value->attachment_name, 'income_attachment') }}"><i class="fa fa-image"></i></a>
                            @endforeach
                        </td>
                        {{-- @if ($item->is_active == 0)
                            <td><span class="badge badge-danger">Inactive</span></td>
                        @else
                            <td><span class="badge badge-success">Active</span></td>
                        @endif --}}
                        <td>
                            <a href="/edit-income/{{ $item->id }}"><i class="far fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
