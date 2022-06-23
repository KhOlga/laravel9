<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Discounts for customers
    |--------------------------------------------------------------------------
    |
    | This file is for storing the discounts levels and theirs size
    | for customers.
    |
    */

    'levels' => [
        'first' => 3, // 3% - Customer paid >= 1000 € for contracts
        'second' => 5, // 5% - Customer paid > 1000 € - 3000 € for contracts
        'third' => 7, // 7% - Customer paid > 3000 € - 5000 € for contracts
        'forth' => 10, // 10% - Customer paid > 5000 € for contracts
    ],
];
