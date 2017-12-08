<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header" data-background-color="my-color" style="background-color: #5682a3;">
                <h6>Users</h6>
            </div>
            <div class="card-content">
                <div class="action">
                    <a class="btn btn-success" onclick="UserModule.showAddUserForm(event, this)" data-toggle="modal" data-target="#userEditModal">Create User</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>E-mail</th>
                            <th>User group</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @if($user->usersGroup->access_level >= Auth::user()->usersGroup->access_level)
                            <tr>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->email}}</td>
                                <td><strong>{{$user->usersGroup->name}}</strong></td>
                                <td class="text-right">
                                    <a class="btn btn-primary" onclick="UserModule.showEditUserForm(event, this, '{{$user->id}}')" data-toggle="modal" data-target="#userEditModal">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" onclick="UserModule.delete(event, this, '{{$user->id}}')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                {!! $users->render() !!}
            </div>            
        </div>
    </div>
</div>

<div id="userEditModal" class="modal fade">
    <div class="modal-dialog">
        <div id="editUserForm" class="modal-content">
            
        </div>
    </div>
</div>