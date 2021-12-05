# A Simple Image Validation Project

The aim of this project is to allow an external system to validate an existing image via a cli script.
It also provides a simple mechanism to allow files to be saved, stored and deleted via
different storage providers, which are configurable via config files.

## Installation

Clone the project and open the terminal to the projects root directory.
Bring up the docker environment, using ```docker-composer up -d```.

When containers are ready, install required php dependencies.
This can be achieved using the following steps:
* Open the php-fpm containers terminal ```docker exec -it {project_direcotry_name}_php-fpm_1 /bin/sh```
the ```{project_direcotry_name}``` is the name of the projects root directory
* Install dependencies via composer ```composer install```

## Test Images

A collection of test images have been provided within the projects 'storage' directory.

## Image Validation Command

The image validation script can be run using ```php console/validate.php storage/1.jpg```. See the storage directory
for sample image files.

## Tests

Unit tests can be run by using the ```test``` command.

## Todos
* Complete unit tests
* Make a wrapper to allow Intervention to use our default storage provider or a provider of choice.