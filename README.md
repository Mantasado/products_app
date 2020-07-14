# Product recommendation based on weather condition

This app connects to API https://api.meteo.lt/ to get current weather conditions of a city and based on condition gets products from database.

## Installation

Use the package manager to clone repository.
run migration to create database tables and seeder to populate database tables

```bash
php artisan migrate
php artisan db:seed
```

## Usage

Currently hosted on Heroku.com and db4free.net

To make a get request, enter a city name at the end of url https://recommend-product-app.herokuapp.com/api/products/recommended/{city name}
(recommended to use https://www.postman.com/)

example:
https://recommend-product-app.herokuapp.com/api/products/recommended/vilnius

## License
[MIT](https://choosealicense.com/licenses/mit/)