<?php
/**
 * An interface for all vacancy objects
 *
 */
namespace Lib\Models\Interfaces;

interface VacancyInterface {

    /**
     * VacancyInterface constructor.
     *
     * @param bool $id  if id is given load the data of the vacancy from the correct data source
     */
    public function __construct($id = false) ;


    /**
     * A function to save the vacancy object to the correct data source
     */
    public function save() ;


    /**
     * A function to load data from the correct data source
     *
     * @param $vacancyId
     * @return \stdClass
     */
    public function load($vacancyId);
}