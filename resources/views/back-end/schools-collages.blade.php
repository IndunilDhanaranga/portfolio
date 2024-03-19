<div class="card">
    <form action="/create-school" method="post">
        @csrf
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Schools & Colleges</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addSchool()"><i
                                class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" onclick="removeSchool()"><i
                                class="fa fa-minus"></i></span>
                    </div>
                    <input hidden type="number" value="1" id="school-attempt">
                </div>
            </div>
            <div class="card-body" id="additional-school">

            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<script>
    var school_details = <?php echo json_encode($school_details); ?>;
</script>
