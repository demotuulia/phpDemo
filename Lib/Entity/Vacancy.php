<?php
/**
 * An entity class for the sql table 'vacancy'.
 *
 * Note this is a demo. We don't do transactions to the real database.
 * We use array self::$vacancies like it were a cache array.
 *
 * This code only to make the unit tests to work. In real world ot would be different.
 *
 */
namespace  Lib\Entity;

class Vacancy{


    /**
     * An array which in the real world would be content of table 'vacancy'
     * In this demo we use array. Instead of real SQL transactions we updated this array.
     *
     * @var array
     */
    private static $vacancies= [];


    /**
     * Initialize the array  self::$vacancies like were a cache of the table 'vacancy' by reading
     * all recored:
     *
     * SELECT * from 'vacancy'
     */
    public static function initialize() {
        if (empty(self::$vacancies)) {
            self::$vacancies =[
                1 => (object)['id' => 1, 'title'=>'Vacancy 1', 'content' => 'Lori ispsum blaa blaa']
            ];
        }
    }


    /**
     * Set all demo vacancies to array
     *
     * @param array $vacancies
     */
    public static function setVacancies($vacancies)
    {
        self::$vacancies = $vacancies;
    }


    /**
     * Load vacancy.
     *
     * In real world we would read a reacord from table 'vacancy':
     *
     * SELECT * from  'vacancy' where id = $vacancyId
     *
     * @param $vacancyId
     */
    public static function load($vacancyId){
        self::initialize();
        return self::$vacancies[$vacancyId];
    }


    /**
     *  Save data to database
     *
     *  In this demo we update array self::$vacancies instead of sql update
     *
     *
     * @return $id  vancancy id. We need this when inserting a new item.
     */
    public function save($vacancy) {

        // If no id, this is an insert.
        $id = (!isset($vacancy->id)) ? count(self::$vacancies) + 1 : $vacancy->id;

        // SQL update.
        self::$vacancies[$id] =  $vacancy ;
        return $id;
    }

}
