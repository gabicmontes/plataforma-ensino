

## About Teaching Platform

Teaching Platform is a simple web application that allows teachers to create and manage courses, and students to enroll in courses and submit assignments. It is built using the [Laravel](https://laravel.com/) PHP framework.

This not is a complete application, but rather a skeleton that you can use to build your own application. It is intended to be used as a starting point for a project, and not as a finished product.

## Installation

After cloning the repository, run the following commands to install the application:

```
git clone git@gitlab.com:contaja/onboarding-contaja-total.git
cd onboarding-contaja-total
cp .env.example .env  
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
sail up -d
sail npm install
sail composer install
sail artisan migrate:fresh --seed
sail npm run watch

```
