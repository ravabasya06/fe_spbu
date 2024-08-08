# Dashboard Analysis SPBU

Dashboard SPBU App made with Laravel, Vue 3, and InertiaJS

## Development
### Clone Repository
First, clone this repository with ```git clone``` and then go to the folder with ```cd fe_spbu```

### Copy Environment Configuration
Second, copy the `.env.example` with : ```cp .env.example .env```

### Change Environment Configuration
After copying the `.env`, uncomment the db credentials and change the db connection to `mysql`. After that change to your preferred db credentials.

### Install Packages and Dependencies
After copying and configuring the database, run ```npm install``` and ```composer install``` to install npm / composer and all of the packages needed.

### Generating Key and Migrating Database
And then, run ```php artisan key:generate``` and ```php artisan migrate```

### Seeding Data
To get the demo and example datas, run ```php artisan db:seed``` to seed some datas, you can change the amount of you want in `database/seeders/DatabaseSeeder.php`

### Running App
After having everything done, you can run the app by running ```npm run dev``` and ```php artisan serve``` in a new terminal.

## To-do
dashboard datas
