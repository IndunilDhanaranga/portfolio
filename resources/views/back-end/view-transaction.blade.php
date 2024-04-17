<div class="row">
    <div class="col-12">
        <div class="invoice p-3 mb-3">

            <div class="row">
                <div class="col-12">
                    <h4>
                        <small class="float-right">Date: {{ $transaction_details->date }}</small>
                    </h4>
                </div>

            </div>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>{{ $transaction_details->BankDetails->account_holder }}</strong><br>
                        Account No : {{ $transaction_details->BankDetails->account_no }}<br>
                        Bank : {{ $transaction_details->BankDetails->bank_name }}<br>
                        Branch : {{ $transaction_details->BankDetails->branch }}<br>
                    </address>
                </div>
            </div>


            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                @if ($transaction_details->ProjectDetails)
                                    <th>Project</th>
                                @endif
                                <th>Description</th>
                                <th>Amount</th>
                                @if (count($transaction_details->AttachmentDetails) > 0)
                                    <th>Attachment</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaction_details->IncomeType ? $transaction_details->IncomeType->type : $transaction_details->ExpenseType->type }}
                                </td>
                                @if ($transaction_details->ProjectDetails)
                                    <td>{{$transaction_details->ProjectDetails->title}}</td>
                                @endif
                                <td>{{ $transaction_details->description }}</td>
                                <td>{{ $transaction_details->amount }}</td>
                                @if (count($transaction_details->AttachmentDetails) > 0)
                                    <td>
                                        <ul class="list-inline">
                                            @foreach ($transaction_details->AttachmentDetails as $attachment)
                                                <li class="list-inline-item"><a target="_blank"
                                                        href="{{ getUploadAttachment($attachment->attachment_name, $transaction_details->IncomeType ? 'income_attachment' : 'expense_attachment') }}"><i
                                                            class="fa fa-image"></i></a></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
