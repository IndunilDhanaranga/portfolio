<div class="card">
    <div class="card-body">
        <form action="/create-site-settings" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="income_type">Site Name</label>
                        <input type="text" class="form-control" value="{{ $site_settings->site_name ?? '' }}" id="site_name" name="site_name" placeholder="Site Name">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="income_type">Logo</label>
                        <input type="file" class="dropify" name="logo" data-default-file="{{ getUploadImage( $site_settings->logo ?? '', 'site_assets' )}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="income_type">Favicon</label>
                        <input type="file" class="dropify" name="favicon" data-default-file="{{ getUploadImage( $site_settings->favicon ?? '', 'site_assets' )}}">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="income_type">Login</label>
                        <input type="file" class="dropify" name="login_bg_image" data-default-file="{{ getUploadImage( $site_settings->login_bg_image ?? '', 'site_assets' )}}">
                    </div>
                </div>
            </div>
    </div>
    <div class="card-footer">
        <button type="submit"class="btn btn-primary float-left">Save</button>
    </div>
    </form>

</div>
