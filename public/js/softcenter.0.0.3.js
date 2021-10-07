function dataManage(id,mode,url_path) {
    // var mode = "removeMedication";
    swal.fire({
        title: 'Are you sure?',
        text: "You are going to "+mode+ " !",
        type: 'warning',
        icon: "warning",
        dangerMode: true,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, '+mode,
        showLoaderOnConfirm: true,
        preConfirm: function() {
            return new Promise(function(resolve) {
                $.ajax({
                    url: url_path,
                    type: 'POST',
                    data: {id : id, mode: mode},
                    dataType: 'json'
                    })
                    .done(function(response){
                        if (response.error) {
                            swal.fire(
                               { icon: 'error',
                                title: 'Message',
                                text: response.error,}
                            );
                        }
                        if (response.success) {
                            swal.fire(
                                {icon: 'success',
                                title: 'Message',
                                text: response.success,}
                            );
                            location.reload();
                        }

                    })
                    .fail(function(){
                        swal.fire('Oops...', 'Something went wrong !', 'error');
                    });
            });
        },
        allowOutsideClick: false
    });
}

$(document).ready(function (e) {
    $(document).on("click", ".chaangesystemuserinfo_btn", function () {
        var id = $(this).attr('dataId');
        $("#updateuserinfo_form"+id).ajaxForm({

            beforeSend: function () {
                $(".chaangesystemuserinfo_btn").addClass("disabled");
                $(".chaangesystemuserinfo_btn").attr("disabled", "");
                $(".chaangesystemuserinfo_btn").html(
                    ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
                );
            },

            success: function (data) {
                if (data.errors) {
                    $(".chaangesystemuserinfo_btn").removeAttr("disabled", "");
                    $(".chaangesystemuserinfo_btn").removeClass("disabled");
                    $(".chaangesystemuserinfo_btn").html("Save changes");
                    toastr.error(data.errors);
                }
                if (data.success) {
                    $(".chaangesystemuserinfo_btn").removeAttr("disabled", "");
                    $(".chaangesystemuserinfo_btn").removeClass("disabled");
                    $(".chaangesystemuserinfo_btn").html("Save changes");
                    toastr.success(data.message);
                    location.reload();
                }
            },
        });
    });


    $("#startup_details_form").ajaxForm({
        beforeSend: function () {
            $(".startup_details_btn").addClass("disabled");
            $(".startup_details_btn").attr("disabled", "");
            $(".startup_details_btn").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".startup_details_btn").removeAttr("disabled", "");
                $(".startup_details_btn").removeClass("disabled");
                $(".startup_details_btn").html("Submit Form");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".startup_details_btn").removeAttr("disabled", "");
                $(".startup_details_btn").removeClass("disabled");
                $(".startup_details_btn").html("Submit Form");
                $("#startup_details_form")[0].reset();
                toastr.success(data.message);
                window.location.href = "startup-products";
            }
        },
    });

    $("#developer_form_data").ajaxForm({
        beforeSend: function () {
            $(".dev_save_btn").addClass("disabled");
            $(".dev_save_btn").attr("disabled", "");
            $(".dev_save_btn").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".dev_save_btn").removeAttr("disabled", "");
                $(".dev_save_btn").removeClass("disabled");
                $(".dev_save_btn").html("save details");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".dev_save_btn").removeAttr("disabled", "");
                $(".dev_save_btn").removeClass("disabled");
                $(".dev_save_btn").html("update details");
                // $("#dev_save_btn")[0].reset();
                toastr.success(data.success);
                location.reload();
            }
        },
    });

    $("#add_system_user_form").ajaxForm({
        beforeSend: function () {
            $(".add_system_user_btn").addClass("disabled");
            $(".add_system_user_btn").attr("disabled", "");
            $(".add_system_user_btn").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".add_system_user_btn").removeAttr("disabled", "");
                $(".add_system_user_btn").removeClass("disabled");
                $(".add_system_user_btn").html("save");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".add_system_user_btn").removeAttr("disabled", "");
                $(".add_system_user_btn").removeClass("disabled");
                $(".add_system_user_btn").html("save");
                $("#add_system_user_form")[0].reset();
                toastr.success(data.message);
                location.reload();
            }
        },
    });

    $("#add_announcement_form").ajaxForm({
        beforeSend: function () {
            $("#announcement_loader").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $("#announcement_loader").html("");
                toastr.error(data.errors);
            }
            if (data.success) {
                $("#announcement_loader").html("");
                $("#add_announcement_form")[0].reset();
                toastr.success(data.message);
                location.reload();
            }
        },
    });

    $("#stakeholder_details_form").ajaxForm({
        beforeSend: function () {
            $(".stakeholder_details_btn").addClass("disabled");
            $(".stakeholder_details_btn").attr("disabled", "");
            $(".stakeholder_details_btn").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".stakeholder_details_btn").removeAttr("disabled", "");
                $(".stakeholder_details_btn").removeClass("disabled");
                $(".stakeholder_details_btn").html("Submit Form");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".stakeholder_details_btn").removeAttr("disabled", "");
                $(".stakeholder_details_btn").removeClass("disabled");
                $(".stakeholder_details_btn").html("Submit Form");
                $("#stakeholder_details_form")[0].reset();
                toastr.success(data.message);
                location.reload();
            }
        },
    });

    $("#changepassword-form").ajaxForm({
        beforeSend: function () {
            $(".waiting-saving").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".waiting-saving").html("");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".waiting-saving").html("");
                $("#changepassword-form")[0].reset();
                toastr.success(data.message);
                location.reload();
            }
        },
    });
    $("#changeuserinfo_form").ajaxForm({
        beforeSend: function () {
            $(".waiting-change-saving").html(
                ' <div class="overlay d-flex justify-content-center align-items-center"><i class="fas fa-2x fa-sync fa-spin"></i></div>'
            );
        },

        success: function (data) {
            if (data.errors) {
                $(".waiting-change-saving").html("");
                toastr.error(data.errors);
            }
            if (data.success) {
                $(".waiting-change-saving").html("");
                $("#changeuserinfo_form")[0].reset();
                toastr.success(data.message);
                location.reload();
            }
        },
    });

    var i = 1;

    // $("#add_another").click(function () {
    $(document).on("click", "#add_another", function () {
        i++;
        $("#dynamic_field").append(
            '<tr id="row' +
                i +
                '" class="dynamic-added"><td><input type="text" name="founder_name[]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><input type="text" name="founder_phone[]" placeholder="Enter Founder Phone" class="form-control name_list" required="" /></td><td><select class="form-control" id="sel1" name="founder_gender[]" required><option value="">select founder gender</option><option value="Male">Male</option><option value="Female">Female</option> </select></td><td><button type="button" name="remove" id="' +
                i +
                '" class="btn btn-danger btn_remove">X</button></td></tr>'
        );
    });

    $(document).on("click", ".btn_remove", function () {
        var button_id = $(this).attr("id");
        $("#row" + button_id + "").remove();
    });
    $(document).on("click", ".btn_remove_row", function () {
        var button_id = $(this).attr("id");
        $("#row_remove" + button_id + "").remove();
    });

    $(document).on("click", "#stakeholderList", function () {
        // alert('alert');
        $("#notListed").addClass('d-none');
        if ($("#stakeholderList").val() == "Not listed") {
            $("#notListed").removeClass('d-none');
       }
    });
});

// function stakeholderList() {
//    if ($("#stakeholderList").val() == "Not listed") {
//         $("#notListed").removeClass('invisible');
//    }
// }
function checkOwnershipData() {
    if ($("#ownership").val().length != "") {
        var ownership = $("#ownership").val();
        $.post("getExtraData", { mode: "startupRegister", ownership: ownership }).done(function (data) {
            $('#ownershipData').html(data);
        });
    }else{
        $('#ownershipData').html('');
    }
}
function businessModelData() {
    if ($("#ownership").val().length != "") {
        var ownership = $("#ownership").val();
        $.post("getExtraData", { mode: "startupRegister", ownership: ownership }).done(function (data) {
            $('#ownershipData').html(data);
        });
    }else{
        $('#ownershipData').html('');
    }
}
function productstage() {
    if ($("#product_stage").val().length != "") {
        var id = $("#product_stage").val();
        $.post("getExtraData", { mode: "productStage", id: id }).done(function (data) {
            $('#productStageData').html(data);
        });
    }else{
        $('#productStageData').html('');
    }
}

function hasStakeholder(stage,id,hasStakeholder) {
    $.post("getExtraData", { mode: "checkStakeHolder",stage:stage,id:id, hasStakeholder: hasStakeholder }).done(function (data) {
        $('#checkStakeHolder').html(data);
    });

}
