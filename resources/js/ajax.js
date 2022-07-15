$(document).ready(function() {

    fetchuser();

    function fetchuser() {
        $.ajax({
            type: "GET",
            url: "/fetch-user",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                $('tbody').html("");
                $.each(response.users, function(key, item) {
                    $('tbody').append('<tr>\
                <td>' + item.id + '</td>\
                <td>' + item.name + '</td>\
                <td>' + item.age + '</td>\
                <td>' + item.email + '</td>\
                <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
            \</tr>');
                });
            }
        });
    }
    $(document).on('click', '.add_user', function(e) {

        e.preventDefault();

        $(this).text('Sending..');

        var data = {
            'name': $('.name').val(),
            'age': $('.age').val(),
            'email': $('.email').val(),

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/userajax",
            data: data,
            dataType: "json",
            success: function(response) {
                // console.log(response);
                if (response.status == 400) {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('.add_user').text('Save');
                } else {
                    $('#save_msgList').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#AddUserModal').find('input').val('');
                    $('.adduser').text('Save');
                    $('#AddUserModal').modal('hide');
                    fetchuser();
                }
            }
        });

    });

    $(document).on('click', '.editbtn', function(e) {
        e.preventDefault();
        var stud_id = $(this).val();
        // alert(stud_id);
        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/edit-user/" + stud_id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').modal('hide');
                } else {
                    // console.log(response.User.name);
                    $('#name').val(response.User.name);
                    $('#email').val(response.User.email);
                    $('#age').val(response.User.age);
                    $('#stud_id').val(stud_id);
                }
            }
        });
        $('.btn-close').find('input').val('');

    });

    $(document).on('click', '.update_user', function(e) {
        e.preventDefault();

        $(this).text('Updating..');
        var id = $('#stud_id').val();
        // alert(id);

        var data = {
            'name': $('#name').val(),
            'age': $('#age').val(),
            'email': $('#email').val(),

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "/update-user/" + id,
            data: data,
            dataType: "json",
            success: function(response) {
                // console.log(response);
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function(key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                    $('.update_user').text('Update');
                } else {
                    $('#update_msgList').html("");

                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').find('input').val('');
                    $('.update_user').text('Update');
                    $('#editModal').modal('hide');
                    fetchuser();
                }
            }
        });

    });

    $(document).on('click', '.deletebtn', function() {
        var user_id = $(this).val();
        $('#DeleteModal').modal('show');
        $('#deleteing_id').val(user_id);
    });

    $(document).on('click', '.delete_user', function(e) {
        e.preventDefault();
        $(this).text('Deleting..');
        var id = $('#deleteing_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/delete-user/" + id,
            dataType: "json",
            success: function(response) {
                // console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.delete_user').text('Yes Delete');
                } else {
                    $('#success_message').html("");
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('.delete_user').text('Yes Delete');
                    $('#DeleteModal').modal('hide');
                    fetchuser();
                }
            }
        });
    });

});
