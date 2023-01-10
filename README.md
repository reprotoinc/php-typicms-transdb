<h1 align="center">TypiCMS TransBD</h1>

Based on [themsaid/laravel-langman](https://github.com/themsaid/laravel-langman)

Forked from [ludmanp/typicms-transdb](https://github.com/ludmanp/typicms-transdb)

## Installation

Begin by installing the package through Composer. Run the following command in your terminal:

```
$ composer require ludmanp/typicms-transdb
```

# Usage

### Searching view files for missing translations and updates DB and files

```
php artisan trans:sync
```

This command will look into all files in `resources/views`, `app` and `Modules` and find all translation keys that are not covered in your translation files, after
that it appends those keys to the files with a value equal to key. If key prefix is `db`, then value will be added to DB. 