// ************************************************ Event **********************************************
// ---------------------------------------------- Page Load --------------------------------------------
$(document).ready(function() {
    $('select#iccCardID').multiselect({
        header: true,
        noneSelectedText: 'Default selected all',
    }).multiselectfilter();
});