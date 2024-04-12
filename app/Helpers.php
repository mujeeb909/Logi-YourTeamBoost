<?php

namespace App\Helpers;

function pre_print($data)
{
    echo '<pre>';
    print_r(json_decode(json_encode($data)));
    exit;
}