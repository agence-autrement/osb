<?php

define('DOING_AJAX', true);
if (!isset( $_REQUEST['action']))
    die('-1');

require_once('../../../wp-load.php');

header('Content-Type: text/html');
send_nosniff_header();

header('Cache-Control: no-cache');
header('Pragma: no-cache');
$action = esc_attr(trim($_REQUEST['action']));

$allowed_actions = array(
    'mon_action_date',
    'mon_action_theme',
    'mon_action_type',
    'mon_action',
    'multiFilter',
    'clear_filter'
);

if(in_array($action, $allowed_actions)) {
    if(is_user_logged_in())
        do_action('wp_ajax_'.$action);
    else
        do_action('wp_ajax_nopriv_'.$action);
} else {
    die('-1');
};