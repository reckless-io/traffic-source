<?php
$installer = $this;
/* @var $installer Mage_Sales_Model_Resource_Setup */

$installer->startSetup();

$data = array(
    'type'               => 'varchar',
    'label'              => 'web_source',
    'grid'               => true,
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 890,
    'position'           => 890,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_web_source', $data);

// Create index to enhance the search speed on the grid
$installer->getConnection()->addIndex(
    $installer->getTable('sales/order_grid'),
    $installer->getIdxName('sales/order_grid', array('rkl_web_source')),
    array('rkl_web_source')
);

$data = array(
    'type'               => 'varchar',
    'label'              => 'utmz_utmcct',
    'grid'               => true,
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 940,
    'position'           => 940,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_utm_campaign', $data);

// Create index to enhance the search speed on the grid
$installer->getConnection()->addIndex(
    $installer->getTable('sales/order_grid'),
    $installer->getIdxName('sales/order_grid', array('rkl_utm_campaign')),
    array('rkl_utm_campaign')
);

$data = array(
    'type'               => 'varchar',
    'label'              => 'utmz_utmcsr',
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 900,
    'position'           => 900,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_utm_source', $data);

$data = array(
    'type'               => 'varchar',
    'label'              => 'utmz_utmcmd',
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 910,
    'position'           => 910,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_utm_medium', $data);

$data = array(
    'type'               => 'varchar',
    'label'              => 'utmz_utmccn',
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 920,
    'position'           => 920,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_utm_term', $data);

$data = array(
    'type'               => 'varchar',
    'label'              => 'utmz_utmctr',
    'input'              => 'text',
    'default'            => '',
    'sort_order'         => 930,
    'position'           => 930,
    'user_defined'       => 1,
    'default'            => null,
    'required'           => 0
);

$installer->addAttribute('order', 'rkl_utm_content', $data);


$installer->endSetup();
