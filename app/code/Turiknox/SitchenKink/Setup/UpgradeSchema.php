<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $setup->getConnection()->addColumn(
                $setup->getTable('turiknox_sitchenkink_entity'),
                'image',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => 255,
                    'nullable' => false,
                    'comment' => 'Image'
                ]
            );

            $setup->getConnection()->addColumn(
                $setup->getTable('turiknox_sitchenkink_entity'),
                'price',
                [
                    'type' => Table::TYPE_DECIMAL,
                    'length' => '12,4',
                    'nullable' => false,
                    'default' => '0.0000',
                    'comment' => 'Price'
                ]
            );
        }
        $setup->endSetup();
    }
}
