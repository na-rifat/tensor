(function ($) {
    $(document).ready(function () {
        const _element_header = $(`.custom-tensor-header`);
        const _element_window = $(window);

        _element_window.on(`scroll`, function (e) {

            let current_pos = _element_window.scrollTop();

            if (current_pos > 1 && !_element_header.hasClass(`active-sticky`)) {
                _element_header.addClass('active-sticky')
            } else if (current_pos <= 1 && _element_header.hasClass(`active-sticky`)) {
                _element_header.removeClass(`active-sticky`)
            }

        })
    });
})(jQuery)