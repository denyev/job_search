<?php

/**
* @var $faker \Faker\Generator
* @var $index integer
*/

return [
    'title' => $faker->jobTitle,
    'date' => $faker->dateTimeThisMonth('now')->format('Y-m-d'),
    'city' => $faker->city,
    'company' => $faker->sentence(2, true),
    'salary' => (int) round($faker->numberBetween(10000,100000), -3),
    'description' => $faker->realText(600),  // generate a sentence with 7 words
];
