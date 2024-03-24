<div class="card">
    <div class="card-body">
        <form action="/create-school" method="post">
            @csrf
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title">Schools & Colleges</div>
                        </div>
                        <div class="col-md-1">
                            <div class="float-right">
                                <span class="btn btn-warning btn-xs" onclick="addSchool()"><i
                                        class="fa fa-plus"></i></span>
                                <span class="btn btn-warning btn-xs ml-1" id="remove" onclick="removeSchool()"><i
                                        class="fa fa-minus"></i></span>
                            </div>
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
</div>
<script>
    var school_details = <?php echo json_encode($school_details); ?>;
</script>
