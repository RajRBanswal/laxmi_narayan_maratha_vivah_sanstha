
$('form button.add').click(function (e) {
    e.preventDefault();
    var nb_attachments = $('form input').length;
    var $input = $('<input type="file" name="attachment[]">');
    $input.on('change', function (evt) {
        var f = evt.target.files[0];
        console.log(f.name);
        // $('form').append($(this));
        $('ul.list').append('<li><img src="./' + f.name + '" width="100px"/></li>');
    });

    // $input.hide();
    $input.trigger('click');
});


function getAge() {
    var dob = document.getElementById('bDay').value;
    var start_date = new Date(dob);
    var date = new Date();
    var end_date = new Date(start_date);
    end_date.setFullYear(date.getFullYear() - start_date.getFullYear());
    $("#age").val(end_date.getFullYear());
}


$("body").on('click', '.toggle-password', function () {
    $(this).toggleClass("fa-eye ");
    var input = $("#pass_log_id");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }

});

function addAddress() {
    var x = $("#sameascurrentaddress").is(":checked");
    if (x == true) {
        var c_add = $("#current_address").val();
        var p_add = $("#permanent_address").val(c_add);
    } else if (x == false) {
        var p_add = $("#permanent_address").val("");
    }
}

function getState(id) {
    $.ajax({
        url: 'state.php',
        type: "POST",
        data: {
            country_id: id,
            country_value: 'country'
        },
        cache: false,
        success: function (result) {
            console.log(result);
            $('#state').html(result);
        }
    });
}

function getCity(sid) {
    $.ajax({
        url: 'state.php',
        type: "POST",
        data: {
            state_id: sid,
            state_value: 'state'
        },
        cache: false,
        success: function (result2) {
            console.log(result2);
            $('#city').html(result2);
        }
    });
}

$(document).ready(function () {
    $("#testModalButton").click(testModal);
})

var testModal = function () {
    try {
        $("#exampleModalCenter").modal();
    } catch (e) {
        alert(e);
    }
}

$('#religion').on("change", function () {
    var id = $("#religion option:selected").attr('data-id');
    $('#caste').empty();
    $.ajax({
        url: "get_data_from_database.php",
        method: "post",
        data: {
            caste_id: id,
            caste_data: "Caste_data"
        },
        success: function (data) {
            $('#caste').html(data);
            // console.log(data);
        }
    });
});

$('#education').on("change", function () {
    var id = $("#education option:selected").attr('data-id');
    $.ajax({
        url: "get_data_from_database.php",
        method: "post",
        data: {
            education_id: id,
            education_data: "education_data"
        },
        success: function (data) {
            $('#education_detail').html(data);
            console.log(data);
        }
    });
});

$(document).ready(function () {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function (event) {
        var files = event.target.files;

        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            let reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,  // Ensures the image is fully visible in the cropper
            preview: '.preview',
            autoCropArea: 1, // Makes sure the crop area takes the full image
            movable: true,
            zoomable: true,
            scalable: true
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function () {
        let canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });

        canvas.toBlob(function (blob) {
            let url = URL.createObjectURL(blob);
            let reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                var base64data = reader.result;
                $('#image_length').val(base64data);
                $modal.modal('hide');
                // $('#uploaded_image').show();
                $('#uploaded_image').attr('src', base64data);
            };
        });
    });

});

