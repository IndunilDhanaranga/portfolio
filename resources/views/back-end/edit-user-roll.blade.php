<div class="card card-primary mt-3">
    <div class="card-header">
        <h5 class="m-1">Edit User Roll</h5>
    </div>
    <form action="/update-user-roll/{{ $user_roll->id }}" method="post">
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_roll">User Roll</label>
                        <input type="text" class="form-control" id="user_roll" name="user_roll"
                            value="{{ $user_roll->title }}" placeholder="User Roll">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" data-select2-id="1">
                        <label for="">Status</label>
                        <select class="form-control select2 " name="is_active" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="true">
                            <option value="">No Select</option>
                            <option value="1" {{ $user_roll->is_active == 1 ? 'selected' : '' }}>Active</option>ෆ
                            <option value="0" {{ $user_roll->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="card card-info mt-3">
    <div class="card-header">
        <h5 class="m-1">Permission</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0" id="user-role">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Modules</th>
                        <th>Select All</th>
                        <th>Specific Permission</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (getAllPermissions() as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item['group'] }}</td>
                            <td> <input type="checkbox" value="" class="select-all" onclick="selectAll(this)">
                                <label>
                                    Select All
                                </label>
                            </td>
                            <td class="cheack-all">
                                @foreach ($item['data'] as $data)
                                    <input class="form-check-input" type="checkbox" name="permission[]"
                                        value="{{ $data['permission'] }}" <?php if (in_array($data['permission'], json_decode($user_roll_permission))) {
                                            echo 'checked';
                                        } ?>>
                                    <label>
                                        {{ $data['title'] }}
                                    </label>
                                    <br>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>
