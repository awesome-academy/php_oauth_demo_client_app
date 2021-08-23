# PHP OAuth Demo: Laravel Passport
This is a demonstation on using Laravel Passport to create an OAuth server. In this project, we'll be able to create clients, issue access tokens, and using those tokens to retrive user's data.

# Requirement
* Git
* Composer
* PHP v7.3 (minimum)
* MySQL v5.7
* Node
* Npm

# Installation

1. Clone the demo to your machine.

2. Setup and config:

Copy the `.env_example` to `.env` and define the enviroment values according to your machine.
```
  cp .env.example .env
```
*NOTE:* For client application, you will need to setup OAuth Server first and retrive OAuth Server's URL, Client ID, Client Secret and Redirect URL.
```
  php artisan key:generate
```
Install packages:
```
  composer install
```
```
  npm install
```
```
  npm run dev
```
Run migration and seeder:
```
  php artisan migrate
```
```
  php artisan db:seed --class=UserSeeder
```
