<?php

if (!function_exists('h_cut_text')) {
    function h_cut_text($t, $w)
    {
        return substr($t, 0, strpos($t, ' ', $w)) . '...';
    }
}

if ( ! function_exists('h_text_file')) {
    function h_text_file($n)
    {
        return 'texts/' . h_text_number($n) . '.txt';
    }
}

if ( ! function_exists('h_text_number')) {
    function h_text_number($n)
    {
        return str_pad($n, 3, '0', STR_PAD_LEFT);
    }
}
