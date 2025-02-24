<?php

namespace Helpers;

use Faker\Factory;
use Models\Users\User;
use Models\Users\Employee;
use Models\Companies\Company;
use Models\Companies\RestaurantChain;
use Models\RestaurantLocation;
use DateTime;

class RandomGenerator {
    public static function user(): User {
        $faker = Factory::create();

        return new User(
            (int) $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email(),
            $faker->password(),
            $faker->phoneNumber(),
            $faker->address(),
            new DateTime($faker->dateTimeThisCentury()->format('Y-m-d H:i:s')),
            new DateTime($faker->dateTimeBetween('-10 years', '+20 years')->format('Y-m-d H:i:s')),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    public static function company(): Company {
        $faker = Factory::create();

        return new Company(
            $faker->company(),
            $faker->year(),
            $faker->catchPhrase(),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->word(),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->numberBetween(10, 10000)
        );
    }

    public static function companies(int $min, int $max): array {
        $faker = Factory::create();
        $companies = [];
        $numOfCompanies = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfCompanies; $i++) {
            $companies[] = self::company();
        }

        return $companies;
    }

    public static function restaurantChain(): RestaurantChain {
        $faker = Factory::create();
    
        return new RestaurantChain(
            $faker->company(),
            $faker->year(),
            $faker->catchPhrase(),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->word(),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->numberBetween(10, 10000),
            (int) $faker->randomNumber(),
            self::restaurantLocations(2, 5), 
            $faker->word(),
            $faker->numberBetween(1, 500),
            $faker->boolean(),
            $faker->year(),
            $faker->company()
        );
    }
    

    public static function restaurantChains(int $min, int $max): array {
        $faker = Factory::create();
        $restaurantChains = [];
        $numOfRestaurants = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfRestaurants; $i++) {
            $restaurantChains[] = self::restaurantChain();
        }

        return $restaurantChains;
    }

    public static function employee(): Employee {
        $faker = Factory::create();

        return new Employee(
            (int) $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email(),
            $faker->password(),
            $faker->phoneNumber(),
            $faker->address(),
            new DateTime($faker->dateTimeThisCentury()->format('Y-m-d H:i:s')),
            new DateTime($faker->dateTimeBetween('-10 years', '+20 years')->format('Y-m-d H:i:s')),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->jobTitle(),
            $faker->randomFloat(2, 30000, 200000),
            new DateTime($faker->dateTimeThisDecade()->format('Y-m-d H:i:s')),
            [$faker->word(), $faker->word(), $faker->word()]
        );
    }

    public static function employees(int $min, int $max): array {
        $faker = Factory::create();
        $employees = [];
        $numOfEmployees = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numOfEmployees; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }

    public static function restaurantLocation(): RestaurantLocation {
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->company(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->postcode(),
            self::employees(2,10),
            $faker->boolean()
        );
    }

    public static function restaurantLocations(int $min, int $max): array {
        $faker = Factory::create();
        $locations = [];
        $numOfLocations = $faker->numberBetween($min, $max);
    
        for ($i = 0; $i < $numOfLocations; $i++) {
            $locations[] = self::restaurantLocation(); 
        }
    
        return $locations;
    }
    
}
