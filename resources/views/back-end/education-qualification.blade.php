<div class="card">
    <form action="" method="post">
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
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card-title">Education Levels</div>
                    </div>
                    <div class="col-md-1">
                        <span class="btn btn-warning btn-xs" onclick="addLevel()"><i
                                class="fa fa-plus"></i></span>
                        <span class="btn btn-warning btn-xs" onclick="removeLevel()"><i
                                class="fa fa-minus"></i></span>
                    </div>
                    <input hidden type="number" value="1" id="level-attempt">
                </div>
            </div>
            <div class="card-body" id="additional-level">

            </div>
        </div>
        <div class="card card-secondary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title">Career Info</div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-md-6 col-12">
                        <label for="m-path">Main Path</label>
                        <input type="text" class="form-control" id="m-path" placeholder="Main Path"
                            name="m-path">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
