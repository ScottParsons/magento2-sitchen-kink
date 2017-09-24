<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Context;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Entity extends AbstractDb
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $date;

    /**
     * Data constructor.
     *
     * @param Context $context
     * @param DateTime $date
     */
    public function __construct(
        Context $context,
        DateTime $date
    ) {
        parent::__construct($context);
        $this->date = $date;
    }

    /**
     * Resource initialisation
     */
    protected function _construct() // @codingStandardsIgnoreLine
    {
        $this->_init('turiknox_sitchenkink_entity', 'entity_id');
    }

    /**
     * Before save callback
     *
     * @param AbstractModel|\Turiknox\SitchenKink\Model\Entity $object
     * @return \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    protected function _beforeSave(AbstractModel $object) // @codingStandardsIgnoreLine
    {
        $object->setUpdatedAt($this->date->gmtDate());
        if ($object->isObjectNew()) {
            $object->setCreatedAt($this->date->gmtDate());
        }
        return parent::_beforeSave($object);
    }
}
