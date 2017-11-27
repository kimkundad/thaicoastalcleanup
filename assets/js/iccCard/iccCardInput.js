// ************************************************ Event **********************************************
// --------------------------------------------- Page Load ---------------------------------------------
$(document).ready(function() {
    window.location = $('#backToTop').prop('href');

    // DateTimePicker.
    $('#dtsEventDate').datetimepicker({
        viewMode: 'days',
        format: 'DD-MMM-YYYY',
        useCurrent: true
    });
    $('#dtsEventDate').val(moment().format('DD-MMM-YYYY'));

    // UI Block.
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

    initialPage();
});

// --------------------------------------------- Submit & Reset ----------------------------------------
$('button#btnSave').on('click', function(e) {
    if (ValidateInputRequire()) {
        saveIccCard();
    } else {
        ShowDialog(dltValidate);
    }
});


// ---------------------------------------------- Radio input ------------------------------------------
$('input[type=radio]#eventDistance').on('change', function() {
    $('input[type=number]#eventDistanceEtc').val('');
    $('input[type=number]#eventDistanceEtc').removeClass('input-require');
    $('input[type=number]#eventDistanceEtc').prop('disabled', true);
});
$('input[type=radio]#eventDistanceEtc').on('change', function() {
    $('input[type=number]#eventDistanceEtc').removeClass('input-require');
    $('input[type=number]#eventDistanceEtc').addClass('input-require');
    $('input[type=number]#eventDistanceEtc').prop('disabled', false);
});
// ---------------------------------------------- Number input -----------------------------------------
$('input[type=number]#eventDistanceEtc').on('change', function() {
    $('input[type=radio]#eventDistanceEtc').val($('input[type=number]#eventDistanceEtc').val());
});
// ---------------------------------------------- Select input -----------------------------------------
$('select#provinceCode').on('change', function(e) { ChangeProvince(e); });





// ************************************************ Method *********************************************
//-------------------------------------------------- Save ----------------------------------------------
function saveIccCard() {
    let baseUrl = $('input#baseUrl').val();
    let dataType = $('input#dataType').val();
    
    let data = {                                // JSON Create.
        "dsIccCardMasterSerializeArray":    $('form#formIccCardMaster').serializeArray(),
        "dsContactInfo":                    queryContactInfoDataForSave(),
        "dsEntangledAnimal":                queryEntangledAnimalDataForSave(),
        "dsGarbageTransaction":             queryGarbageTransactionDataForSave()
    };

    // Ajax add or edit record.
    $.ajax({
        url: baseUrl + 'iccCard/ajaxSaveInputData',
        type: 'post',
        data: data,
        beforeSend: function() {
            swal({
                title: "Saving...",
                text: '<span class="text-info"><i class="fa fa-refresh fa-spin"></i> Saving please wait...</span>',
                showConfirmButton: false,
            });
        },
        error: function(xhr, textStatus) {
            swal("Error", textStatus + xhr.responseText, "error");
        },
        complete: function() {},
        success: function(result) {
            if (result == 0) {
                swal({
                    title: "Success",
                    text: "Save data to database has success",
                    type: "success",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonText: "Done",
                    confirmButtonClass: "btn btn-success",
                }).then(function() {
                    window.location.href = baseUrl + "iccCard/view"
                });
            } else {
                swal({
                    title: "Unsuccess!",
                    text: "Can't save<span class='text-info'> data </span>to database" + result,
                    type: "error",
                    confirmButtonColor: "#DD6B55"
                });
            }
        }
    });
}


// _______________________________________________ Province ____________________________________________
function ChangeProvince(e) {
    let baseUrl = $('input#baseUrl').val();
    let provinceCode = $('select#provinceCode :selected').val();

    let data = { 'provinceCode': provinceCode };

    // Get amphur table filter with province code by ajax.
    $.ajax({
        url: baseUrl + 'iccCard/ajaxGetAmphurCodeAndName',
        type: 'post',
        data: data,
        dataType: 'json',
        beforeSend: function() {},
        error: function(xhr, textStatus) {
            swal("Error", textStatus + xhr.responseText, "error");
        },
        complete: function() {},
        success: function(result) {
            setSelectElementOfAmphur(result, $('select#amphurCode'));
        }
    });
}

// _____________________________________________ Initial Page __________________________________________
function initialPage() {
    if($('input[type=radio]#eventDistanceEtc').prop('checked')) {
        $('input[type=number]#eventDistanceEtc').prop('disabled', false);
    } else {
        $('input[type=number]#eventDistanceEtc').prop('disabled', true);
    }
}





//-------------------------------------------------- Tool ----------------------------------------------
//___________________________________________ Set Select Elecment ______________________________________
function setSelectElementOfAmphur(dataSet, $selector) {
    $selector.empty();
    $selector.append('<option value="0">----</option>');
    for (var i = 0; i < dataSet.length; i++) {
        $selector.append('<option value="' + dataSet[i].AmphurCode + '">' + dataSet[i].AmphurName + '</option>');
    }
}