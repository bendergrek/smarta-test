$(document).ready(function() {
    const checkboxes = $('.course-checkbox');
    const MAX_CHECKED = 3;

    checkboxes.on('click', function() {
        const checkedCount = checkboxes.filter('[aria-checked="true"]').length;

        if (checkedCount >= MAX_CHECKED) {
            checkboxes.filter('[aria-checked="false"]').attr('disabled', 'disabled');
        } else {
            checkboxes.removeAttr('disabled');
        }
    });
});
