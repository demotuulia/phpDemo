<?php
/**
 * An abstract class to be used by a specified data source class
 *
 */
namespace Lib\Models;


use Lib\Models\Interfaces\VacancyInterface;

abstract class Vacancy implements VacancyInterface
{
    /**
     * The id of the vacancy
     *
     * @var integer
     */
    protected $id;


    /**
     * The vacancy title
     *
     * @var string
     */
    protected $title;


    /**
     * The vacancy content/description
     *
     * @var string
     */
    protected $content;


    /**
     * The vacancy description
     *
     * @var string
     */
    protected $description;


    /**
     * __construct
     *
     * @param integer $vacancyId
     */
    abstract public function __construct($id = false) ;



    /**
     * Save the current data to the current data source
     */
    abstract public function save() ;


    /**
     *  Load the data for given vacancy
     *
     * @param integer $vacancyId
     */
    abstract public function load($vacancyId);


    /**
     * Public function to get a property
     *
     * @param type $property
     * @return string
     */
    public function get($property) {
        if ($this->isMember($property)) {
            return $this->$property;
        }
    }


    /**
     * Set a property
     *
     * This is a simple set method and very generic.
     * In case there are specific rules of checks for a property,
     * this function must be extended.
     *
     * @param type $property   name of the field
     * @param type $value
     */
    public function set($property, $value) {
        if ($this->isMember($property)) {
            $this->$property = $value;
        }
    }


    /**
     * Create a new vacancy object with empty items
     *
     * @return stdClass
     */
    public static function create() {

        $newVacancy =  (object)[ 'title'=>'', 'content' => ''];
        return $newVacancy;
    }


    /**
     * Check if the property is a member of this class and can be read or edited
     *
     * @param type $property
     * @return boolean
     * @throws Exception
     */
    private function isMember($property) {

        // Define members which can be get and set
        $members = array_keys(get_object_vars($this));
        unset($members['testData']);
        unset($members['id']);
        unset($members['childClass']);

        // Check
        if (in_array($property, $members)) {
            return true;
        } else {
            throw new Exception('property ' . $property . ' not found.');
        }
    }
}
