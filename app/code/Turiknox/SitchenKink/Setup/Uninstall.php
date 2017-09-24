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

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Magento\Config\Model\ResourceModel\Config\Data;
use Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Uninstall implements UninstallInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var Data
     */
    protected $configData;

    public function __construct(
        CollectionFactory $collectionFactory,
        Data $configData
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->configData        = $configData;
    }

    /**
     * Drop module table and remove config
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if ($setup->tableExists('turiknox_sitchenkink_entity')) {
            $setup->getConnection()->dropTable('turiknox_sitchenkink_entity');
        }

        // Remove any store configuration that contains a path of 'turiknox_sitchenkink'
        $collection = $this->collectionFactory->create()
            ->addPathFilter('turiknox_sitchenkink');

        foreach ($collection as $config) {
            $this->deleteConfig($config);
        }
    }

    /**
     * @param AbstractModel $config
     * @throws \Exception
     */
    protected function deleteConfig(AbstractModel $config)
    {
        $this->configData->delete($config);
    }
}
