# Brewery Import Application
This application will consume third party api endpoint [Open Brewery DB](https://api.openbrewerydb.org/breweries), and 
insert the returned brewery as a product into Shopify Store


## Prerequites
- Docker
- PHP 7.4
- Laravel 7
- Mysql 

## System Design
This system mainly relies on two major functions below

#### Scheduling
Scheduling task will run every hour to fetch brewery list from endpoint above, then create job task and push that into queue

#### Queue
Jobs of queue will be handled automatically, and it will insert brewery as a product into shopify store

## How to start
* Clone the repository

* Under root folder, run following command to start docker containers
```
docker-compose up -d
```
* Connect fpm container 
```$xslt
docker exec -it breweries_php_fpm bash
```
* Create .env file
```$xslt
cp .env.example .env 
```
* Install dependencies
```$xslt
composer install
```
* Generate application key
```$xslt
php artisan key:generate
```
* Run migration
```$xslt
php artisan migrate
```

## Web
Once all steps above are finished, you can visit web application on link http://localhost:8080, it should load a 
product list page. The list will be empty until products have been inserted into shopify store

## Manually trigger task
If you don't want to wait for schedule task to be trigger, you can manually trigger the artisan command
* Connect Schedule container 
```$xslt
docker exec -it brweries_schedule bash
``` 
* Run command 
```$xslt
php artisan breweries:import
```
* Go to http://localhost:8080 and you will see the product list (It may takes a few seconds to handle tasks in the queue)

## How to test
[codeception](https://codeception.com/) is used as test framework, you can find test cases in `tests` folder
#### Start test
* Connect fpm container 
```$xslt
docker exec -it breweries_php_fpm bash
```
* Run following command 
```$xslt
php vendor/bin/codecept run unit
```

