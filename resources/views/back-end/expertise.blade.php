<div class="card">
    <form action="/create-expertise" method="post">
        @csrf
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title">Expertise</div>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-warning btn-xs" onclick="addExpertise()"><i
                                    class="fa fa-plus"></i></span>
                            <span class="btn btn-warning btn-xs" onclick="removeExpertise()"><i
                                    class="fa fa-minus"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="expertise">

                </div>
                <input hidden type="number" value="0" id="expertise-attempt">
            </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<script>
    var expertise = <?php echo json_encode($expertise); ?>;
</script>
