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

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class InstallData implements InstallDataInterface
{
    /**
     * Install data
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $data = [
                [
                    'name' => 'Hello World!',
                    'description' => 'This is the first description.',
                    'is_active' => 1
                ],
                [
                    'name' => 'Hello Again!',
                    'description' => 'This is the second description.',
                    'is_active' => 1
                ],
                [
                    'name' => 'Welcome To The Third Title',
                    'description' => '<h2>Title</h2><br/><p>A slightly longer description with some HTML</p>',
                    'is_active' => 0
                ],
            ];
            foreach ($data as $datum) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('turiknox_sitchenkink_entity'), $datum);
            }
        }
    }
}
