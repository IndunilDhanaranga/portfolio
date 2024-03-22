<div class="card">
    <form action="/create-additional-details" method="post">
        @csrf
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Skills</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addSkills()"><i class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" id="remove_skill" onclick="removeSkills()"><i class="fa fa-minus"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="skills">

            </div>
            <input hidden type="number" value="0" id="skills-attempt">
        </div>
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Languages</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addLanguages()"><i class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" id="remove_lang" onclick="removeLanguages()"><i
                                class="fa fa-minus"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="languages">

            </div>
            <input hidden type="number" value="0" id="languages-attempt">
        </div>
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Work Experience</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addWork()"><i class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" id="remove_work" onclick="removeWork()"><i class="fa fa-minus"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="company">

            </div>
            <input hidden type="number" value="0" id="company-attempt">
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
<script>
    var skills = <?php echo json_encode($skills); ?>;
    var languages = <?php echo json_encode($languages); ?>;
    var work_experience = <?php echo json_encode($work_experience); ?>;
</script>
