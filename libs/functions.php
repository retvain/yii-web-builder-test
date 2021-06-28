<?php

function dmp($data, $die = false) {
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if ($die) {
        die;
    }
}
