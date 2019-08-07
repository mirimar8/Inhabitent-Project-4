
jQuery(document).ready(function ($) {

    const $searchToggle = $('.search-toggle');
    const $searchField = $('.search-field');

    $searchToggle.click(function () {
        $searchField.toggle('300');
        $searchField.focus();
    });

    $searchField.blur(function () {
        if ($searchField.val() === '') {
            $searchField.toggle('300');
        } else {
            $searchField.focus();
        }
    });
});
