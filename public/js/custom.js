function resetForm(form) { document.getElementById(form).reset(); }

function viewPatientModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewpatient/' + data,

        success: function (response) {

            $('#view-gender').html(response.formatedgender);

            $('#view-birthdate').html(response.formatedbirthdate);

            $('#view-phone').html(response.formatedphone);

            $('#view-created_at').html(response.formatedcreated_at);

            $('#view-updated_at').html(response.formatedupdated_at);

            $('#view-username').html(response.username);

            $('#view-usermodifiedname').html(response.usermodifiedname);

            $('#view-doctorfullname').html(response.doctorfullname);

            $('#view-doctorid').html(response.doctorid);

            $('#view-fullname').html(response.fullname);

            $('#view-email').html(response.email);

            $('#view-address').html(response.address);

            $('#view-status').html(response.status);

            $('#view-height').html(response.height);

            $('#view-weight').html(response.weight);

            $('#view-bmi').html(response.bmi);

            $("#view-patientimage").attr("src", response.image);

        }

    });

}

function editPatientModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewpatient/' + data,

        success: function (response) {

            resetForm('patientForm');

            $('input[name=id]').val(response.id);

            $('input[name=fullname]').val(response.fullname);

            $('input[name=birthdate]').val(response.birthdate);

            $('input[name=height]').val(response.height);

            $('input[name=weight]').val(response.weight);

            $('input[name=bmi]').val(response.bmi);

            $('input[name=email]').val(response.email);

            $('input[name=phone]').val(response.phone);

            $('input[name=address]').val(response.address);

            $("#status").val(response.status).change();

            $("#doctorid").val(response.doctorid).change();

            $("#gender").val(response.gender).change();

        }

    });

}

function editDoctorModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewdoctor/' + data,

        success: function (response) {

            resetForm('doctorForm');

            $('input[name=id]').val(response.id);

            $('input[name=fullname]').val(response.fullname);

            $('input[name=birthdate]').val(response.birthdate);

            $('input[name=facebook]').val(response.facebook);

            $('input[name=twitter]').val(response.twitter);

            $('input[name=instagram]').val(response.instagram);

            $('input[name=email]').val(response.email);

            $('input[name=phone]').val(response.phone);

            $('input[name=address]').val(response.address);

            $("#status").val(response.status).change();

            $("#specialtyid").val(response.specialtyid).change();

            $("#gender").val(response.gender).change();

        }

    });

}

function editRoomModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewroom/' + data,

        success: function (response) {

            resetForm('roomForm');

            $('input[name=id]').val(response.id);

            $('input[name=name]').val(response.name);

            $("#companyid").val(response.companyid).change();

        }

    });

}


function editSpecialtyModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewspecialty/' + data,

        success: function (response) {

            resetForm('specialtyForm');

            $('input[name=id]').val(response.id);

            $('input[name=name]').val(response.name);

            $("#companyid").val(response.companyid).change();

        }

    });

}

function editCompanyModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewcompany/' + data,

        success: function (response) {

            resetForm('companyForm');

            $('input[name=id]').val(response.id);

            $('input[name=fullname]').val(response.fullname);

            $('input[name=birthdate]').val(response.birthdate);

            $('input[name=website]').val(response.website);

            $('input[name=facebook]').val(response.facebook);

            $('input[name=twitter]').val(response.twitter);

            $('input[name=instagram]').val(response.instagram);

            $('input[name=email]').val(response.email);

            $('input[name=phone]').val(response.phone);

            $('input[name=address]').val(response.address);

            $("textarea[name='specialty']").val(response.specialty);
        }

    });

}

function editUserModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewuser/' + data,

        success: function (response) {

            resetForm('editUserForm');

            $('input[name=editid]').val(response.id);

            $('input[name=editname]').val(response.name);

            $("#editrole").val(response.role).change();
        }

    });

}


function formAppointmentModal(id) {

    const data = isNaN(id) ? parseInt(id) : id;

    $.ajax({

        type: "get",

        url: 'http://localhost:8000/viewappointment/' + data,

        success: function (response) {

            resetForm('appointmentForm');

            $('input[name=id]').val(response.id);

            $('input[name=subject]').val(response.subject);

            $('input[name=start]').val(response.formatedstart);

            $('input[name=finish]').val(response.formatedfinish);

            $("#roomid").val(response.roomid).change();

            $("#doctorid").val(response.doctorid).change();

            $("#patientid").val(response.patientid).change();

            $("textarea[name='notes']").val(response.notes);

        }

    });

}