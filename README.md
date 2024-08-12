# FrankenPHP example to demonstrate Fatal

This repository is related to:
https://github.com/dunglas/frankenphp/issues/961

A simple web application which demonstrates a situation catching a `Fatal error` in the [FrankenPHP Runtime for Symfony](https://github.com/php-runtime/frankenphp-symfony), for which we are trying to find a solution.

## Installation

1. Clone the repository
2. Run `composer install`
3. Run `docker compose up`
4. Open [http://localhost:8081](http://localhost:8081)

## Issue demonstration

Use the following files to trigger the issue:

1. 5MB Example TIFF file ([Download](https://file-examples.com/wp-content/storage/2017/10/file_example_TIFF_5MB.tiff))
2. 10MB Example TIFF file ([Download](https://file-examples.com/wp-content/storage/2017/10/file_example_TIFF_10MB.tiff))

The first file will work nicely. The [Symfony Form Component](https://symfony.com/doc/current/components/form.html) generates an error for the large file as being too large.
- See result: [https://ibb.co/F0mWL6S](https://ibb.co/F0mWL6S)

The second file triggers the situation which we are trying to solve.
- See result in `dev` mode: [https://ibb.co/Bfm3b8m](https://ibb.co/Bfm3b8m)
- See result in `prod` mode: [https://ibb.co/G7qs6nr](https://ibb.co/G7qs6nr)

## Additional information

- In `.docker/php.ini` the `post_max_size` and `upload_max_filesize` are set to `5M`
- In `.docker/Caddyfile` the worker mode has been enabled. It makes no difference to use the worker or non-worker mode.
- In `src/Form/UploadFileFormType.php` the `maxSize` for File uploads is set to 4MB.