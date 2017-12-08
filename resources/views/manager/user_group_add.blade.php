{!! Form::open(['url' => '#', 'method' => 'POST', 'class' => '']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Create New User Group</h4>
</div>
<div class="modal-body">
    <div class="bot-keyboard-edit"> 
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Group name</label>
                    {!! Form::text('name', '', [ 'class' => 'form-control' ]) !!}
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
            @foreach($accessModules as $moduleKey => $moduleVal)
                <div class="form-group">
                    <label class="control-label" style="font-weight:800;">{{$moduleVal['name']}}</label>
                    {!! Form::select('modules['.$moduleKey.'][]', $moduleVal['action'], null, ['label' => $moduleVal['name'], 'class' => 'select2-multiple', 'multiple' => 'multiple', 'style' => 'width:100%']) !!}
                </div>            
            @endforeach
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" onclick="UserGroupModule.add(event, this)">Create group</button>
</div>
{!! Form::close() !!}