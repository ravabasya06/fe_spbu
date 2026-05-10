# Dashboard Analysis SPBU

Dashboard SPBU App made with Laravel, Vue 3, and InertiaJS.
Internship Project

## Preview

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997175188062308/Screenshot_72.png?ex=6a01beb2&is=6a006d32&hm=29eed262447b2f56e22742efb6e40904a067358c86d9bb80f2783d9bec2661bd&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997175611953232/Screenshot_73.png?ex=6a01beb3&is=6a006d33&hm=a7084d07c1bdadc58e52edaf86505e300ee72c6ba248a10a42cfe45e0f8118bd&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997225939144714/Screenshot_74.png?ex=6a01bebf&is=6a006d3f&hm=d2b65798ed702386d7fd19cbf9617b8299cb56eba448eb34eccbf21bfb88231c&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226283204728/Screenshot_75.png?ex=6a01bebf&is=6a006d3f&hm=60848a8a4392f351733d5755a08d9e0ef9b32c614da73f019c2f19f06efa1294&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226639593594/Screenshot_76.png?ex=6a01bebf&is=6a006d3f&hm=34d842d8e4c1526a0ed702bdb2340ba2f39d1d2d759d3606e11adb867761335c&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997226975395880/Screenshot_77.png?ex=6a01bebf&is=6a006d3f&hm=31236b86185bb9dca7718a5726b2bc495d46b0353ad99a012b1a25ab7c098d09&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997225133965472/Screenshot_82.png?ex=6a01bebe&is=6a006d3e&hm=6888d2d4b46fe437d9c9359bcc5defcfa7b1d799cc9d66ef1d4ba4d99cee7dfb&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997227298099350/Screenshot_78.png?ex=6a01bebf&is=6a006d3f&hm=e424e23733baabd5c246f0884da7229a9b9b62ee31fe69b3e4a1dc572a8410cd&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997224693432330/Screenshot_81.png?ex=6a01bebe&is=6a006d3e&hm=385d8a1863acd3ff4f76de005ba5b4f4be940ff44bff242174b1090513b29696&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997227692490875/Screenshot_79.png?ex=6a01bebf&is=6a006d3f&hm=9a88f7d54bede928269aef6f59b46733b756974d94d05e004bda6a939c7426db&=&format=webp&quality=lossless)

![Image](https://media.discordapp.net/attachments/667721366903980042/1502997228065656872/Screenshot_80.png?ex=6a01bebf&is=6a006d3f&hm=0785bd74bacb34456be14060f1d848f75221e2003ddec86706a2e2ba1253fa7c&=&format=webp&quality=lossless)

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
