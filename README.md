## Step by Step


clone project


Enter the project folder

```bash
cd alter-solutions/
```

Install dependencies

```bash
composer i or composer install
```

Set variables

```bash
cp .env.example .env
```

Generate secret key Laravel app

```bash
php artisan key:generate
```
Generate secret key JWT

```bash
php artisan jwt:secret
```

Sample Setup Variables Database
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=root
```
Run to populate the database
```bash
php artisan migrate --seed

```

Up server

```bash
php artisan serve
```
go to the root of the page
```bash
http://127.0.0.1:8000
```



Access Documentation
```
http://127.0.0.1:8000/api/documentation
```


