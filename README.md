# Dashboard Analysis SPBU

Dashboard SPBU App made with Laravel, Vue 3, and InertiaJS

## Development
### Clone Repository
First, clone this repository with 
```sh
git clone
```
 and then go to the folder with 
 ```sh
 cd fe_spbu
 ```
### Copy Environment Configuration
Second, copy the `.env.example` with 
```sh
cp .env.example .env
```

### Change Environment Configuration
After copying the `.env`, uncomment the db credentials and change the db connection to `mysql`. After that change to your preferred db credentials.

### Install Packages and Dependencies
After copying and configuring the database, run 
```sh
npm install
```
and 
```sh
composer install
```
to install npm / composer and all of the packages needed.

### Generating Key and Migrating Database
And then, run 
```sh
php artisan key:generate
```
and 
```sh
php artisan migrate
```

### Seeding Data
To get the demo and example datas, run 
```sh
php artisan db:seed
```
to seed some datas, you can change the amount of you want in `database/seeders/DatabaseSeeder.php`

### Running App
After having everything done, you can run the app by running 
```sh
npm run dev
```
and 
```sh
php artisan serve
```
in a new terminal.

### Account
By default there will be one account upon seeding, \
username : admin\
password : admin

## To-do
dashboard datas
