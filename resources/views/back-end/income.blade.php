<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="income" class="table table-striped table-bordered nowrap" style="width:100%">
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
                    @if (isPermissions('edit-income'))
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script>
    var is_permission = <?php echo isPermissions('edit-income') ? 'true' : 'false'; ?>;
</script>
