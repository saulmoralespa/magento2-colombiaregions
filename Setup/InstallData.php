<?php
/**
 * Colombia Regions
 *
 * @license    http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author     Damián Culotta (http://www.damianculotta.com.ar/)
 */

namespace Barbanet\ColombiaRegions\Setup;

use Magento\Directory\Helper\Data;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements InstallDataInterface
{

    /**
     * Directory data
     *
     * @var Data
     */
    protected $directoryData;

    /**
     * Init
     *
     * @param Data $directoryData
     */
    public function __construct(Data $directoryData)
    {
        $this->directoryData = $directoryData;
    }


    /**
     * Install Data
     *
     * @param ModuleDataSetupInterface $setup   Module Data Setup
     * @param ModuleContextInterface   $context Module Context
     *
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Fill table directory/country_region
         * Fill table directory/country_region_name for en_US locale
         */
        $data = [
            ['CO','Amazonas','Amazonas'],
            ['CO','Antioquia','Antioquia'],
            ['CO','Arauca','Arauca'],
            ['CO','Atlántico','Atlántico'],
            ['CO','Bolívar','Bolívar'],
            ['CO','Boyacá','Boyacá'],
            ['CO','Caldas','Caldas'],
            ['CO','Caquetá','Caquetá'],
            ['CO','Casanare','Casanare'],
            ['CO','Cauca','Cauca'],
            ['CO','Cesar','Cesar'],
            ['CO','Chocó','Chocó'],
            ['CO','Córdoba','Córdoba'],
            ['CO','Cundinamarca','Cundinamarca'],
            ['CO','Guainía','Guainía'],
            ['CO','Guaviare','Guaviare'],
            ['CO','Huila','Huila'],
            ['CO','La Guajira','La Guajira'],
            ['CO','Magdalena','Magdalena'],
            ['CO','Meta','Meta'],
            ['CO','Nariño','Nariño'],
            ['CO','Norte de Santander','Norte de Santander'],
            ['CO','Putumayo','Putumayo'],
            ['CO','Quindío','Quindío'],
            ['CO','Risaralda','Risaralda'],
            ['CO','San Andrés y Providencia','San Andrés y Providencia'],
            ['CO','Santander','Santander'],
            ['CO','Sucre','Sucre'],
            ['CO','Tolima','Tolima'],
            ['CO','Valle del Cauca','Valle del Cauca'],
            ['CO','Vaupés','Vaupés'],
            ['CO','Vichada','Vichada']
        ];

        foreach ($data as $row) {
            $bind = ['country_id' => $row[0], 'code' => $row[1], 'default_name' => $row[2]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region'), $bind);
            $regionId = $setup->getConnection()->lastInsertId($setup->getTable('directory_country_region'));

            $bind = ['locale' => 'en_US', 'region_id' => $regionId, 'name' => $row[2]];
            $setup->getConnection()->insert($setup->getTable('directory_country_region_name'), $bind);
        }
    }
}