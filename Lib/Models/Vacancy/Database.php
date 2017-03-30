<?php
/**
 * A data source class to handle transactions to a database.
 *
 */
namespace Lib\Models\Vacancy;

use Lib\Models\Vacancy;                      // Generic Vacancy Model
use Lib\Entity\Vacancy as vacancyEntity;     // Sql  Abstraction layer

class Database extends Vacancy {

    /**
     * __construct
     *
     * @param integer $vacancyId
     */
    public function __construct($vacancyId = false) {
        if ($vacancyId) {
            $this->load($vacancyId);
        }
    }


    /**
     * Here we would save the data by updating or inserting
     *
     * @return integer  return the id of the saved vacancy, we need in case of insert.
     */
    public function save() {
        // Create new vacancy object or read existing one from database
        $vacancy =  (!$this->id) ? $this->create(): vacancyEntity::load($this->id);

        // Set data to vacancy object
        $vacancy->title    = $this->title;
        $vacancy->content  = $this->content;
        $vacancyId = vacancyEntity::save($vacancy);

        return $vacancyId;
    }


    /**
     *  Load the data for given vacancy from database
     *
     * @param integer $vacancyId
     */
    public  function load($vacancyId) {

        $vacancy = vacancyEntity::load($vacancyId);
        $this->id       = $vacancyId;
        $this->title    = $vacancy->title;
        $this->content  = $vacancy->content;
    }
}
