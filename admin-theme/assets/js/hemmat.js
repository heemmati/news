/* Delete File manager choosed Staff */
function remove_choosed_image(delete_id, show_id, input_id) {

    $(document).on('click', delete_id, function () {
        let showing_image = $(show_id);
        let input_image = $(input_id);
        showing_image.attr('src', null);
        showing_image.attr('alt', null);
        input_image.val(null);

    });
}


function remove_choosed_file(delete_id, show_id, input_id) {

    $(document).on('click', delete_id, function () {
        let showing_image = $(show_id);
        let input_image = $(input_id);
        showing_image.html(null);

        input_image.val(null);

    });
}


/* Delete File manager choosed Staff */


/* Remonve Parent Elemetn */
    function remove_parent_element(element) {
        $(document).on('click', element , function () {
            let parent = $(this).parent();
            parent.remove();
        });
    }
/* Remonve Parent Elemetn */

