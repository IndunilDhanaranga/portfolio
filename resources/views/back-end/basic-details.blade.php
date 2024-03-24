<div class="card">
    <div class="card-body">
        <form action="/basic-details-create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">Primary Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <label for="f-name">Full Name</label>
                            <input type="text" class="form-control" id="f-name"
                                value="{{ $basic_details->f_name }}" placeholder="Full Name" name="f_name">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="d-name">Display Name</label>
                            <input type="text" class="form-control" placeholder="Display Name"
                                value="{{ $basic_details->d_name }}" id="d-name" name="d_name">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <label for="b-date">Birthday</label>
                            <input type="date" class="form-control" id="b-date" name="b_date"
                                value="{{ $basic_details->b_date }}">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="phone">Mobile Number</label>
                            <input type="number" class="form-control" placeholder="Mobile Number" id="phone"
                                value="{{ $basic_details->p_number }}" min="0" name="phone">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <label for="address">Address</label>
                            <textarea type="address" name="address" id="address" class="form-control" rows="3" placeholder="Address"
                                data-listener-added_df30a99f="true">{{ $basic_details->address }}</textarea>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                value="{{ $basic_details->email }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-teal">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">Images</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="user_image">User Image</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 div-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="user_image"
                                                name="user_image">
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="cover_image">Cover Image</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 div-12">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cover_image"
                                                name="cover_image">
                                            <label class="custom-file-label">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card-title">Additional Connections</div>
                        </div>
                        <div class="col-md-1">
                            <div class="float-right">
                                <span class="btn btn-warning btn-xs" onclick="addConnections()"><i
                                        class="fa fa-plus"></i></span>
                                <span class="btn btn-warning btn-xs ml-1" id="remove_connection"
                                    onclick="removeConnections()"><i class="fa fa-minus"></i></span>
                            </div>
                        </div>
                        <input hidden type="number" value="1" id="connection-attempt">
                    </div>
                </div>
                <div class="card-body" id="additional-connection">

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
                                name="m_path" value="{{ $basic_details->m_path }}">
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="m-path">Caption</label>
                            <input type="text" class="form-control" id="caption" placeholder="Caption"
                                name="caption" value="{{ $basic_details->caption }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 col-12">
                            <label for="m-path">About</label>
                            <textarea type="address" name="about" id="about" class="form-control" rows="4" placeholder="About"
                                data-listener-added_df30a99f="true">{{ $basic_details->about }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<script>
    var portfolio_connections = <?php echo json_encode($basic_details->Connections); ?>;
</script>
