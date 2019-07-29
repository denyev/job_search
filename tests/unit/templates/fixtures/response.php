<?php

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
    'name' => $faker->firstName,
    'phone' => random_int(1111111111, 9999999999),
    'salary' => (int) round($faker->numberBetween(10000,100000), -3),
    'vacancy_id' => random_int(1, 20),
];
