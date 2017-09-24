# Turiknox Sitchen Kink

## Overview

In development. A Magento 2 Kitchen Sink module showing as many simple customisations as possible that can be made to the framework.

## Requirements

Magento 2.1.x

## Installation

This module will add tables to your Magento 2 database. As with any third party modules that do this, it is recommended that you backup your database before installation.

Copy the contents of the module into your Magento root directory.

Enable the module via the command line:

/path/to/php bin/magento module:enable Turiknox_SitchenKink

Run the database upgrade via the command line:

/path/to/php bin/magento setup:upgrade

Run the compile command and refresh the Magento cache:

/path/to/php bin/magento setup:di:compile 

/path/to/php bin/magento cache:clean
