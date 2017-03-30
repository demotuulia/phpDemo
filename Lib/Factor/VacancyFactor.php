<?php
/**
 * A factory class to create a data source object
 *
 */
namespace Lib\Factor;

class VacancyFactor {

    /**
     * build
     *
     * Build a data source object for given data source type
     * If id is given, read the data.
     *
     * @param string $dataSource      'Database' or 'Api'
     * @param type $id                 In case we create a vacancy for existing item, there must ber id
     *                                 to load the data.
     *
     * @return \Lib\Models\Vacancy
     *
     * @throws Exception
     */
    static public function build($dataSource, $id = false) {
        $dataSource = 'Lib\Models\Vacancy\\' . $dataSource;
        if (class_exists($dataSource)) {
            return new $dataSource($id);
        } else {
            throw new Exception("Invalid product type given.");
        }
    }
}
