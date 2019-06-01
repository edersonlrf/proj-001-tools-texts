<?php

if (!function_exists('h_cut_text')) {
    function h_cut_text($t, $w)
    {
        return substr($t, 0, strpos($t, ' ', $w)) . '...';
    }
}
