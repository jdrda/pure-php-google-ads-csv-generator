<?php
/**
 * Main file
 *
 * All functions for XML writing
 *
 * @category Controller
 * @package PurePhpXmlWriter
 * @author Jan Drda <jdrda@outlook.com>
 * @copyright Jan Drda
 * @license https://opensource.org/licenses/MIT MIT
 *
 */

namespace PurePhpGoogleAdsCsvGenerator;


class PurePhpGoogleAdsCsvGenerator
{

    /**
     * XML file pointer
     *
     * @var resource
     */
    private $_filePointer;

    /**
     * XML file name
     *
     * @var string
     */
    private $_fileName;

    /**
     * XML file header
     *
     * @var array
     */
    private $_fileHeader = array(
        'Campaign',
        'Campaign type',
        'Campaign Daily Budget',
        'Networks',
        'Ad Schedule',
        'Location',
        'Excluded Webs',
        'Ad Group',
        'Max CPC',
        'Max CPT',
        'Keyword',
        'Criterion Type',
        'Sitelink Text',
        'Headline',
        'Description Line 1',
        'Description Line 2',
        'Headline 1',
        'Headline 2',
        'Headline 3',
        'Description',
        'Display URL',
        'Final URL',
        'Path 1',
        'Path 2',
        'Tracking Template',
        'Campaign Status',
        'Ad Group Status',
        'Creative Status',
        'Topics',
        'Website',
        'Gender',
        'Age',
        'Website Status',
        'Audience',
        'Id',
        'Status',
        'Product Group',
        'Product Set Label',
        'PLA shop',
        'Country of Sale',
        'Languages',
        'Bid Strategy Type',
        'Promotion',
        'Approval Status',
        'Short headline',
        'Long headline',
        'Business name',
        'Final mobile URL',
        'Image',
        'Square Image',
        'Logo',
        'Landscape logo',
        'Impression tracking template',
        'Impression tracking template 2',
        'Ad name',
        'Type',
        'Desktop Bid Modifier',
        'Mobile Bid Modifier',
        'Tablet Bid Modifier',
        'TV Screen Bid Modifier'
    );

    /**
     * Age groups
     *
     * @var array
     */
    private $_ageGroups = array(
        'Unknown',
        '18-24',
        '25-34',
        '35-44',
        '45-54',
        '55-64',
        '65 or more'
    );

    /**
     * Genders
     *
     * @var array
     */
    private $_genders = array(
        'Unknown',
        'Male',
        'Female'
    );

    /**
     * Prototype of blank row
     *
     * @var array
     */
    private $_blankRow;

    /**
     * Setter for file name
     *
     * @param $filename
     */
    public function setFileName($filename){
        $this->_fileName = $filename;
    }

    /**
     * Getter for file name
     *
     * @return string
     */
    public function getFileName(){
        return $this->_fileName;
    }

    /**
     * Constructor
     *
     * @param string $fileName
     */
    public function __construct($fileName = null)
    {

        /**
         * Generate filename if needed
         */
        if($fileName === null){
            $this->setFileName('ads.csv');
        }
        else{
            $this->setFileName($fileName);
        }

        /**
         * Autoopen file if needed
         */
        $this->openFile();

        /**
         * Generate blank row prototype
         */
        $this->_blankRow = $this->_generateBlankRow();
    }

    /**
     * Destructor
     *
     * Explicitly close the file to make a sure buffer has been written
     */
    public function __destruct()
    {
        $this->closeFile();
    }

    /**
     * Open CSV file
     */
    public function openFile(){
        try {
            $this->_filePointer = fopen($this->_fileName, "w");
        }
        catch (\Exception $e){
            die('File cannot be opened: ' . $e->getMessage());
        }

        /**
         * Add header
         */
        $this->_writeRawRow($this->_fileHeader);
    }

    /**
     * Close CSV file if is opened
     */
    public function closeFile(){
        if(is_resource($this->_filePointer) === true){
            fclose($this->_filePointer);
        }
    }

    /**
     * Write Raw SV row
     */
    private function _writeRawRow($array, $delimiter = "\t", $enclosure = null){
        if($enclosure == null){
            $enclosure = chr(0);
        }
        fputcsv($this->_filePointer, $array, $delimiter, $enclosure);
    }

    /**
     * Generate prototype of blank row
     *
     * @return array
     */
    private function _generateBlankRow(){

        $blankRow = array();
        foreach ($this->_fileHeader as $value){

            $blankRow[strtolower(str_replace(' ', '-', $value))] = '';
        }

        return $blankRow;
    }

    /**
     * Prepare row for write
     *
     * @param $array
     * @return array
     */
    private function _prepareRow($array){
       return array_merge($this->_blankRow, $array);
    }

    /**
     * Prepare and write row
     *
     * @param $array
     */
    private function _writeRow($array, $delimiter = "\t", $enclosure = null){
        $this->_writeRawRow($this->_prepareRow($array), $delimiter, $enclosure);
    }

    /**
     * Write campaign data
     * @param array $config
     */
    public function writeCampaign( $data = array (
        'campaign' => 'Campaign',
        'campaign-type' => 'Search',
        'campaign-daily-budget' => '100.00',
        'networks' => 'Search;Google Search;Search Partners',
        'campaign-status' => 'active'
    )){

        $this->_writeRow($data);
    }

    /**
     * Write Ad group
     *
     * @param array $data
     */
    public function writeAdGroup( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'max-cpc' => '1',
        'max-cpt' => '1',
        'ad-group-status' => 'Active'
    ))
    {

        $this->_writeRow($data);
    }

    /**
     * Write keyword
     *
     * @param array $data
     */
    public function writeKeyword( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'keyword' => 'Keyword',
        'criterion-type' => 'Phrase',
        'status' => 'Active',
    ))
    {

        $this->_writeRow($data);
    }

    /**
     * Write ad
     *
     * @param array $data
     */
    public function writeAd( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'description-line-1' => 'Description line 1',
        'description-line-2' => 'Description line 2',
        'headline-1' => 'Headline 1',
        'headline-2' => 'Headline 2',
        'headline-3' => 'Headline 3',
        'final-url' => 'https://www.final.com/',
        'status' => 'Active',
    ))
    {

        $this->_writeRow($data);
    }

    /**
     * Write age
     *
     * @param array $data
     */
    public function writeAge( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'age' => 'Unknown',
        'status' => 'Active',
    ))
    {

        $this->_writeRow($data);
    }

    /**
     * Write age
     *
     * @param array $data
     */
    public function writeGender( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'gender' => 'Unknown',
        'status' => 'Active',
    ))
    {

        $this->_writeRow($data);
    }

    /**
     * Write all age groups
     *
     * @param array $data
     */
    public function writeAllAges( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'status' => 'Active',
    ))
    {
        foreach ($this->_ageGroups as $ageGroup) {
            $data['age'] = $ageGroup;
            $this->_writeRow($data);
        }
    }

    /**
     * Write all genders
     *
     * @param array $data
     */
    public function writeAllGenders( $data = array (
        'campaign' => 'Campaign',
        'ad-group' => 'Ad Group',
        'status' => 'Active',
    ))
    {
        foreach ($this->_genders as $gender) {
            $data['gender'] = $gender;
            $this->_writeRow($data);
        }
    }
}