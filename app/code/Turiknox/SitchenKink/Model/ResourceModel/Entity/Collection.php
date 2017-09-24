<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Model\ResourceModel\Entity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id'; // @codingStandardsIgnoreLine

    /**
     * Collection initialisation
     */
    protected function _construct() // @codingStandardsIgnoreLine
    {
        $this->_init('Turiknox\SitchenKink\Model\Entity', 'Turiknox\SitchenKink\Model\ResourceModel\Entity');
    }
}
