
jQuery(document).ready(function ($) {

    const $searchToggle = $('.main-navigation .search-toggle');
    const $searchField = $('.main-navigation .search-field');

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
