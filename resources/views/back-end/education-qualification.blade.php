<div class="card">
    <form action="" method="post">
        @csrf
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
