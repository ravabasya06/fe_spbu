# Dashboard Analysis SPBU

Dashboard SPBU App made with Laravel, Vue 3, and InertiaJS.
Internship Project

## Preview

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997175188062308/Screenshot_72.png?ex=6a0af932&is=6a09a7b2&hm=be215ee615d6220cb63fa886afaccded6c09b0aa1659425e531d8d9f5ab24813&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997175611953232/Screenshot_73.png?ex=6a0af933&is=6a09a7b3&hm=0401484e212c60e28fd062fd2ea768527506efb997f29bbacea0ac66ed3d0657&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997225939144714/Screenshot_74.png?ex=6a0af93f&is=6a09a7bf&hm=f1e45f7532b0197f85ac49eb8db8ed37d8b2e74690c9d519351f757cd326465c&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226283204728/Screenshot_75.png?ex=6a0af93f&is=6a09a7bf&hm=d690b4f294aaa414d97e99e9dd89eca214ad503754f39d04bdf1e2864ca48c4f&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226639593594/Screenshot_76.png?ex=6a0af93f&is=6a09a7bf&hm=046e2c30d2f8ee644d5bb987b3ee217ec353fb1e0af69f5de675dd3936fb0d0d&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226975395880/Screenshot_77.png?ex=6a0af93f&is=6a09a7bf&hm=ea5eaa1d751930946178632319f30c5fe1b5fed013bb709ebea4e8d722087c0d&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997225133965472/Screenshot_82.png?ex=6a0af93e&is=6a09a7be&hm=ba5f9151c0c93026a9682a704445ce2bb31a24b2b46c57d9b32074e15e061e34&=&format=webp&quality=lossless)

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
