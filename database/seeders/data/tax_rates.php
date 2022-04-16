<?php

return [
    [
        'name'          => 'No Tax',
        'alias'         => 'no-tax',
        'rate'          => 0,
        'type'          => \App\Models\TaxRate::FIXED_AMOUNT,
        'description'   => 'No product tax',
    ],
    [
        'name'          => '5% Percent Tax',
        'alias'         => '5-percent-tax',
        'rate'          => 5.0,
        'type'          => \App\Models\TaxRate::PERCENTAGE,
        'description'   => 'The tax rate is 5%',
    ],
    [
        'name'          => '10% Percent Tax',
        'alias'         => '5-percent-tax',
        'rate'          => 10.0,
        'type'          => \App\Models\TaxRate::PERCENTAGE,
        'description'   => 'The tax rate is 10%',
    ],
    [
        'name'          => 'Fixed Tax',
        'alias'         => 'fixed-tax',
        'rate'          => 15.0,
        'type'          => \App\Models\TaxRate::FIXED_AMOUNT,
        'description'   => 'A fixed amount is added to the cost of the product',
    ],
];
