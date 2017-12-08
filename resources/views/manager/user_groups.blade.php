<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="my-color" style="background-color: #5682a3;">
                <h6>User Groups</h6>
            </div>
            <div class="card-content">
                <div class="action">
                    <a class="btn btn-success" onclick="UserGroupModule.showAddUserGroupForm(event, this)" data-toggle="modal" data-target="#userGroupEditModal">Create User Group</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>Access level</th>
                            <th>Count</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userGroups as $group)
                            <tr>
                                <td>{{$group->name}}</td>
                                <td>{{$group->getAccessLevelName()}}</td>
                                <td>{{$group->users->count()}}</td>
                                <td class="text-right">
                                    <a class="btn btn-primary" onclick="UserGroupModule.showEditUserGroupForm(event, this, '{{$group->id}}')" data-toggle="modal" data-target="#userGroupEditModal">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" onclick="UserGroupModule.delete(event, this, '{{$group->id}}')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="userGroupEditModal" class="modal fade">
    <div class="modal-dialog">
        <div id="editUserGroupForm" class="modal-content">
            
        </div>
    </div>
</div>