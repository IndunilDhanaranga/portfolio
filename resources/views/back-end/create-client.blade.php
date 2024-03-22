<form action="/add-client" method="post">
    @csrf
    <div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <div class="card-title" id="form_title">Add Client</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" name="phone" placeholder="Phone No">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="from-group">
                        <label for="">Address</label>
                        <input type="address" class="form-control" name="address" placeholder="Address">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
</form>
</div>
