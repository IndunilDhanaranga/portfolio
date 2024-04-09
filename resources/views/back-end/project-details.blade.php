<div class="card">
    <div class="card-body">
        <form action="/portfolio-project-details" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">Project Info</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="1">
                                <label for="">Project</label>
                                <select class="form-control select2 " name="project_id" style="width: 100%;"
                                    data-select2-id="1" aria-hidden="true">
                                    <option value="">No Select</option>
                                    @foreach ($project as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="d-name">Video</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <input type="file" placeholder="Display Name" value="" name="video[]"
                                        multiple accept="*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-12">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="d-name">Image</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <input type="file" placeholder="Display Name" value="" name="image[]"
                                        multiple accept="image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">

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
