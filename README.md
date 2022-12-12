## Coronatime

Coronatime is a web platform where you can register, authorize and reset password. After Log in
you will discover dashboard where you can see all the statistics of Covid19:

-Number of new cases
-Number of recovered people,
-Number of dead people.

Statistics information is updated everyday, synchronized by https://devtest.ge.

#

### Prerequisites

-   PHP@8.1 and up
-   MYSQL@8 and up\*
-   npm@8 and up\*
-   composer@2 and up\*

#

### Tech Stack

-   [Laravel@9.x](https://laravel.com/docs/9.x) - back-end framework
-   [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation
-   [TailwinUI](https://tailwindui.com/) - for design

#

### Installation

1\. First of all you need to clone Coronatime repository from github:

```
git clone https://github.com/RedberryInternship/natailia-coronatime.git
```

2\. Next step requires you to run _composer install_ and _npm install_ in order to install all the dependencies.

```
composer install
```

```
npm install
```

and also:

```
npm run dev
```

##### Now, you should be good to go!

#

### Migration

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```sh
php artisan migrate
```

````

#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
````

In order to run the dev script defined in the project’s package.json file use:

```sh
  npm run dev
```

### drawsql link:

https://drawsql.app/teams/test-957/diagrams/coronatime
