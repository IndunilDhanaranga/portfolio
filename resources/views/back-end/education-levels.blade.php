<div class="card">
    <form action="" method="post">
        @csrf
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
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
