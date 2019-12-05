[![License](https://poser.pugx.org/jan-drda/pure-php-google-ads-csv-generator/license)](https://packagist.org/packages/jan-drda/pure-php-xml-writer)
[![Latest Stable Version](https://poser.pugx.org/jan-drda/pure-php-google-ads-csv-generator/v/stable)](https://packagist.org/packages/jan-drda/pure-php-xml-writer)
[![Total Downloads](https://poser.pugx.org/jan-drda/pure-php-google-ads-csv-generator/downloads)](https://packagist.org/packages/jan-drda/pure-php-xml-writer)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jdrda/pure-php-google-ads-csv-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jdrda/pure-php-xml-writer/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/jdrda/pure-php-xml-writer/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jdrda/pure-php-xml-writer/build-status/master)

# Simple Google Ads CSV Generator
Simple XML writer library written with basic PHP functions only. The main purpose of this project is generating Google Ads dynamicaly from application, but without API required.

[![ko-fi](https://www.ko-fi.com/img/donate_sm.png)](https://ko-fi.com/A067ES5)

## Installation
```
composer require jan-drda/pure-php-google-ads-csv-generator
```
Then copy example.php to your project root directory. You can modify it upon your requirements and run.
### If you do not have Composer
Install it, it is very simple:
https://getcomposer.org/doc/00-intro.md

## Documentantion
Please see example.php for basic usage, I am working at documentation (copying there):
```php
/**
 * Composer autoload (only if you do not use it anywhere else)
 *
 * It is needed for namespace mapping
 */
require_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

/**
 * Initialize CSV generator
 */
$adWriter = new \PurePhpGoogleAdsCsvGenerator\PurePhpGoogleAdsCsvGenerator(dirname(__FILE__) .
    DIRECTORY_SEPARATOR . 'ads.csv');

/**
 * Write campaign
 */
$adWriter->writeCampaign([
    'campaign' => 'Campaign',
    'campaign-type' => 'Search',
    'campaign-daily-budget' => '100.00',
    'networks' => 'Search;Google Search;Search Partners',
    'campaign-status' => 'active'
]);

/**
 * Write ad group
 */
$adWriter->writeAdGroup([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'max-cpc' => '1',
    'max-cpt' => '1',
    'ad-group-status' => 'Active'
]);

/**
 * Write keyword
 */
$adWriter->writeKeyword([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'keyword' => 'Keyword',
    'criterion-type' => 'Phrase',
    'status' => 'Active',
]);

/**
 * Write Ad
 */
$adWriter->writeAd([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'description-line-1' => 'Description line 1',
    'description-line-2' => 'Description line 2',
    'headline-1' => 'Headline 1',
    'headline-2' => 'Headline 2',
    'headline-3' => 'Headline 3',
    'final-url' => 'https://www.final.com/',
    'status' => 'Active',
]);

/**
 * Write Age
 */
$adWriter->writeAge( [
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'age' => 'Unknown'
]);

// Alternative - write all ages
$adWriter->writeAllAges([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group'
]);

/**
 * Write gender
 */
$adWriter->writeGender([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'gender' => 'Unknown',
    'status' => 'Active',
]);

// Alternative - write all genders
$adWriter->writeAllGenders([
    'campaign' => 'Campaign',
    'ad-group' => 'Ad Group',
    'status' => 'Active',
]);
```
### Additional references

#### Column types 
https://support.google.com/google-ads/editor/answer/57747