## Installation

In order to run this application you must have **docker** running on your computer.

After cloning repository run following commands inside project folder:

Install all **dependencies** (or use [alternative way](#alternative-dependencies-installation-way) if you don't have composer)
```
composer install
```
Create **environment file**
```
cp .env.example .env
```
Run the **sail** command in detached mode
```
vendor/bin/sail up -d
```
Generate **Application key**
```
vendor/bin/sail artisan key:generate
```
Run **migrations** with **seeder**
```
vendor/bin/sail artisan migrate --seed
```
Build assets
```
vendor/bin/sail npm run build
```


## Usage
Then you can access website by this link http://127.0.0.1

Run tests
```
vendor/bin/sail test
```

To stop Laravel app use
```
vendor/bin/sail down
```

## Alternative dependencies installation way
In case you **don't have php and composer** on your computer.
You may install the application's dependencies by navigating
to the application's directory and executing the following command
```
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd):/var/www/html" \
-w /var/www/html \
laravelsail/php82-composer:latest \
composer install --ignore-platform-reqs
```
