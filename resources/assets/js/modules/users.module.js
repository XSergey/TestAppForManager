UserModule = (function() {
    var showErrors = function(form, jqXHR) {
        form.find('.help-block').remove();
        form.find('.has-error').removeClass('has-error');
        var errors = jqXHR.responseJSON;
        var flag = 0;
        for (var error in errors) {
            form.find('[name="' + error + '"]').after('<small class="help-block"><i class="fa fa-warning"></i>' + errors[error] + '</small>').parent().addClass('has-error');
            if (flag == 0) {
                form.find('[name="' + error + '"]').focus();
                flag = 1;
            }
        }
    };
    var showException = function(form, jqXHR) {
        
    };
    var beforeSerialize = function() {
        
    };
    var beforeSend = function($this) {
        $this.attr('disabled', true);
    };

    var complete = function($this) {
        $this.attr('disabled', false);
    };

    return {
        init: function() {

        },
        add: function(e, $this) {
            beforeSerialize();
            e.preventDefault();
            $this = $($this);
            var form = $this.closest('form');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'users',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                beforeSend: function() {
                    beforeSend($this);
                },
                success: function(msg) {
                    $('#editUserForm').modal('hide');
                    window.location.reload();
                },
                complete: function() {
                    complete($this);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    showErrors(form, jqXHR);
                }
            });
        },
        edit: function(e, $this, id) {
            beforeSerialize();
            e.preventDefault();
            $this = $($this);
            var form = $this.closest('form');
            var formData = new FormData(form[0]);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'users/' + id,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                beforeSend: function() {
                    beforeSend($this);
                },
                success: function(msg) {
                    $('#editUserForm').modal('hide');
                    window.location.reload();
                },
                complete: function() {
                    complete($this);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    showErrors(form, jqXHR);
                }
            });
        },        
        delete: function(e, $this, id) {
            e.preventDefault();
            $this = $($this);

            if (!confirm('Подтвердить?')) {
                return;
            }
            $.ajax({
                type: 'POST',
                url: baseUrl + 'users/' + id,
                data: { id: id, _token: _token, _method: 'DELETE' },
                dataType: 'JSON',
                beforeSend: function() {

                },
                success: function(msg) {
                    if (msg.status === true) {
                        $this.closest('tr').remove();
                    }
                },
                complete: function() {

                },
                error: function(jqXHR, textStatus, errorThrown) {

                }
            });
        },
        showAddUserForm: function(e, $this) {
            beforeSerialize();
            e.preventDefault();
            $this = $($this);

            $.ajax({
                type: 'GET',
                url: baseUrl + 'users/ajax/get-add-user-form',
                processData: false,
                contentType: false,
                dataType: 'HTML',
                beforeSend: function() {
                    beforeSend($this);
                },
                success: function(res) {
                    //window.location.hash = 'customers';
                    $('#editUserForm').html(res);
                },
                complete: function() {
                    complete($this);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                }
            });
        },
        showEditUserForm: function(e, $this, $id) {
            beforeSerialize();
            e.preventDefault();
            $this = $($this);

            $.ajax({
                type: 'GET',
                url: baseUrl + 'users/ajax/get-edit-user-form/' + $id,
                processData: false,
                contentType: false,
                dataType: 'HTML',
                beforeSend: function() {
                    beforeSend($this);
                },
                success: function(res) {
                    //window.location.hash = 'customers';
                    $('#editUserForm').html(res);
                },
                complete: function() {
                    complete($this);
                },
                error: function(jqXHR, textStatus, errorThrown) {

                }
            });
        },        
    };
})();