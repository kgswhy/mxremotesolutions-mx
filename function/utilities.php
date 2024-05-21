<?php
if (!function_exists('clean_input')) {
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}

if (!function_exists('validate_input')) {
    function validate_input($data) {
        return trim(htmlspecialchars($data));
    }
}

if (!function_exists('validate_email')) {
    function validate_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>