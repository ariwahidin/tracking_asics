<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function api_url($uri = '')
{
    $CI = &get_instance();
    $base_api_url = $CI->config->item('api_url');

    return rtrim($base_api_url, '/') . '/' . ltrim($uri, '/');
}
