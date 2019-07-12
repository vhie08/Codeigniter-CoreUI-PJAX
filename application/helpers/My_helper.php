<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function ses_data() {
    $CI = & get_instance();  //get instance, access the CI superobject

    $session_data = $CI->session->userdata($CI->config->item('ses_id'));
    return $session_data;
}

function push_create_mod_field($columns) {

    array_push($columns, 'CREATED_BY');
    array_push($columns, 'DATE_CREATED');
    array_push($columns, 'IP_CREATED');
    array_push($columns, 'TERMINAL');

    array_push($columns, 'MODIFIED_BY');
    array_push($columns, 'DATE_MODIFIED');
    array_push($columns, 'IP_MODIFIED');
    array_push($columns, 'TERMINAL_MOD');

    return $columns;
}

function get_date($year, $month) {

    $leap_year = 2012;
    $leap_years = array();

    for ($i = 1; $i <= 10; $i++) {
        $leap_year = $leap_year + 4;
        array_push($leap_years, $leap_year);
    }
    switch ($month) {
        case 1:
            return 31;
            break;
        case 3:
            return 31;
            break;
        case 5:
            return 31;
            break;
        case 7:
            return 31;
            break;
        case 8:
            return 31;
            break;
        case 10:
            return 31;
            break;
        case 12:
            return 31;
            break;
        case 4:
            return 30;
            break;
        case 6:
            return 30;
            break;
        case 9:
            return 30;
            break;
        case 11:
            return 30;
            break;
        case 2:
            if (in_array($year, $leap_years)) {
                return 29;
            } else {
                return 28;
            }
            break;
    }
}
