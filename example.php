<?php
/**
 * Example file generator
 */

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

