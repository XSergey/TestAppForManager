{!! Form::open(['url' => '#', 'method' => 'PUT', 'class' => '']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Edit User</h4>
</div>
<div class="modal-body">
    <div class="bot-keyboard-edit"> 
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating @if(empty($user->group_id)) is-empty @endif">
                    <label class="control-label">User Groups</label>
                    {!! Form::select('group_id', $userGroups, $user->group_id, [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating @if(empty($user->firstname)) is-empty @endif">
                    <label class="control-label">Firstname</label>
                    {!! Form::text('firstname', $user->firstname, [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating @if(empty($user->lastname)) is-empty @endif">
                    <label class="control-label">Lastname</label>
                    {!! Form::text('lastname', $user->lastname, [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating @if(empty($user->email)) is-empty @endif">
                    <label class="control-label">E-mail</label>
                    {!! Form::text('email', $user->email, [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Password</label>
                    {!! Form::text('password', null, [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Confirm password</label>
                    {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="UserModule.edit(event, this, '{{$user->id}}')">Save user</button>
</div>
{!! Form::close() !!}