@extends('pages.datatable_jacket')

@section('title', 'user Page')
@section('content')
@include('modal.user_modal')

<!-- Page Title Start -->
<div class="row">
    <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-title-wrapper">
            <div class="page-title-box">
                <h4 class="page-title bold"><button type="button" class="effect-btn btn btn-dark squer-btn sm-btn"
                        data-toggle="modal" data-target=".bd-example-modal-lg">
                        Add User
                    </button> | Total Users</h4>
            </div>
            <div class="breadcrumb-list">
                <ul>
                    <li class="breadcrumb-link">
                        <a href="#"><i class="fas fa-home mr-2"></i>Rehmat traders</a>
                    </li>
                    <li class="breadcrumb-link active">User</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered item_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>user</th>
                        <th>E.mail</th>
                        <th>Status</th>
                        <th>Blocked</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@stop

@push('script')

<script>
$(document).ready(function() {

    $('#exampleModalLong').on('hidden.bs.modal', function() {
        $(this).find('#formid').trigger('reset');
    })


    // <!-- -------------------- password hide and show function -------------------------- -->

    $(document).on('click', '.eye_button', function() {
        const passwordInput = $("#password");
        const eyeIcon = $(".eye_button");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
        } else {
            passwordInput.attr("type", "password");
            eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
        }
    });



    $(function() {
        var table = $('.item_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'is_admin',
                    name: 'is_admin',
                    orderable: false
                },
                {
                    data: 'blocked',
                    name: 'blocked'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });

    //    <!-- -------------------- insert or update function -------------------------- -->

    $('#formid').on('submit', function(event) {
        event.preventDefault();

        // Perform client-side validation
        if (!validateForm()) {
            return;
        }


        $('.btn-submite').prop('disabled', true);
        $.ajax({
            url: "{{ route('user.insert') }}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.err) {
                    alert(data.err)
                    $('.btn-submite').prop('disabled', false);
                } else {
                    $(".modal").modal("hide");
                    $('.btn-submite').prop('disabled', false);
                    $('.item_datatable').DataTable().ajax.reload();
                    // location.reload()
                    $("#formid")[0].reset();
                }

            },
            error: function(xhr, textStatus, errorThrown) {
                // AJAX request failed, handle the error
                alert("Error: " + errorThrown);
                return false; // Prevent form submission and page refresh
            }
        })
    });



    function validateForm() {
    // Perform your client-side validation here
    var email = $('#email').val();
    var password = $('#password').val();
    var name = $('#name').val();
    if (!name) {
        alert("Please provide a valid Name.");
        return false;
    }

    if (!email) {
        alert("Please provide a valid email.");
        return false;
    }

    if (!password) {
        alert("Please provide a password.");
        return false;
    }

    // Password validation checks
    if (password.length < 8) {
        $("#letter").removeClass("d-none");
        $("#letter").html("Password must be at least 8 characters in length.");
        return false;
    }else if (!/[a-z]/.test(password)) {
        $("#letter").removeClass("d-none");
        $("#letter").html("Password must contain at least one lowercase letter.");
        return false;
    }else if (!/[A-Z]/.test(password)) {
        $("#letter").removeClass("d-none");
        $("#letter").html("Password must contain at least one uppercase letter.");
        return false;
    }else if (!/[0-9]/.test(password)) {
        $("#letter").removeClass("d-none");
        $("#letter").html("Password must contain at least one digit.");
        return false;
    }else if (!/[@$!%*#?&]/.test(password)) {
        $("#letter").removeClass("d-none");
        $("#letter").html("Password must contain a special character.");
        return false;
    }else{
        $("#letter").addClass("d-none");
    }

    return true; // Form is valid
}

    // <!-- -------------------- Select function -------------------------- -->

    $(document).on('click', '.upd', function() {
        var id = $(this).attr("id");
        $.ajax({
            type: 'post',
            url: '/user/edit',
            data: {
                'id': id,
                "_token": "{{ csrf_token() }}"
            },
            success: function(data) {
                $(".modal").modal("show");
                $('#name').val(data.name);
                $('#user_role').val(data.is_admin);
                $('#email').val(data.email);
                $('#i_id').val(data.id);
            }
        });
    });


    //   <!-- -------------------- delete function -------------------------- -->

    $(document).on('click', '.del', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )

                var id = $(this).attr("id");
                $.ajax({
                    type: 'get',
                    url: '/user_destroy',
                    data: {
                        'id': id,
                "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // alert("delee")
                        $('.item_datatable').DataTable().ajax.reload();
                    }
                });
            }
        })
    });


     //   <!-- -------------------- delete function -------------------------- -->

     $(document).on('click', '.blocked', function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )

                var id = $(this).attr("id");
                $.ajax({
                    type: 'post',
                    url: '/user_block',
                    data: {
                        'id': id,
                "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        // alert("delee")
                        $('.item_datatable').DataTable().ajax.reload();
                    }
                });
            }
        })
    });



    $(document).on('keyup', '#password', function() {
        var value = $(this).val();
        $('#passwordhid').val(value);

    });


});



</script>




@endpush