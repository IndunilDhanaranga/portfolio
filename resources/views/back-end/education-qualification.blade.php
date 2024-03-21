<div class="card">
    <form action="/create-education-qualification" method="post">
        @csrf
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Qualifications</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addQualification()"><i
                                class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" onclick="removeQualification()"><i
                                class="fa fa-minus"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="qualification">

            </div>
            <input hidden type="number" value="0" id="qualification-attempt">
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<script>
    var education_level = <?php echo json_encode($education_level); ?>;
    var school_details = <?php echo json_encode($school_details); ?>;
    var education_qualification = <?php echo json_encode($education_qualification); ?>;
</script>
