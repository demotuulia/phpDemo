<?php
/**
 * A test class to test different data sources
 *
 *  This test class demonstrates how the system works in a functional level
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../global.php';
use Lib\Factor\VacancyFactor;


class VacancyTest extends TestCase
{

    /**
     * test Database data source
     */
    public function testDatabase() {

        // Test get
        $testVacancyId = 1;
        $expetctedTitle = 'Vacancy 1';
        $vacancy = VacancyFactor::build('Database', $testVacancyId);

        $this->assertEquals($expetctedTitle, $vacancy->get('title'));

        // Test save by changing the title
        $newTitle = 'Cool';
        $vacancy->set('title' , $newTitle);
        $vacancy->save();

        // load again and check that the title is changed
        $vacancySaved = VacancyFactor::build('Database', $testVacancyId);
        $this->assertEquals($newTitle, $vacancySaved->get('title'));

        // Test insert new vacancy
        $newTitle = 'New Cool';
        $vacancyNew = VacancyFactor::build('Database');

        $vacancyNew->set('title' , $newTitle);
        $newVacancyId =$vacancyNew->save();

        // load again and checkt the title
        $vacancyNewSaved = VacancyFactor::build('Database', $newVacancyId);
        $this->assertEquals($newTitle, $vacancyNewSaved->get('title'));
    }


    /**
     * test Api datasource
     */
    public function testApi() {

        // Test get
        $testVacancyId = 2;
        $vacancy = VacancyFactor::build('Api', $testVacancyId);
        $this->assertEquals('API Vacancy 2', $vacancy->get('title'));


        // Test save
        $newTitle = 'Cool Api';
        $vacancy->set('title' , $newTitle);
        $vacancy->save();

        // load again
        $vacancySaved = VacancyFactor::build('Api', $testVacancyId);
        $this->assertEquals($newTitle, $vacancySaved->get('title'));

        // Test insert new vacancy
        $newTitle = 'New Cool Api';
        $vacancyNew = VacancyFactor::build('Api');
        $vacancyNew->set('title' , $newTitle);
        $newVacancyId =$vacancyNew->save();

        // load again
        $vacancyNewSaved = VacancyFactor::build('Api', $newVacancyId);
        $this->assertEquals($newTitle, $vacancyNewSaved->get('title'));
    }
}










