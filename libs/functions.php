<?php

function dd($data, $die) {
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if ($die) {
        die;
    }
}
