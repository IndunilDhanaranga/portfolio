<div class="card card-default color-palette-box">
    <div class="card-body">
        <table id="bank-statement" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bank Account</th>
                    <th>Transaction Type</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Transaction</th>
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
