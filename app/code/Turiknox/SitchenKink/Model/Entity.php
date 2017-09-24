<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Model;

use Magento\Framework\Model\AbstractModel;
use Turiknox\SitchenKink\Api\Data\EntityInterface;

class Entity extends AbstractModel implements EntityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'turiknox_sitchenkink_entity';

    /**
     * Initialise resource model
     */
    protected function _construct() // @codingStandardsIgnoreLine
    {
        $this->_init('Turiknox\SitchenKink\Model\ResourceModel\Entity');
    }

    /**
     * Get cache identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(EntityInterface::NAME);
    }

    /**
     * Set Name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        return $this->setData(EntityInterface::NAME, $name);
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(EntityInterface::DESCRIPTION);
    }

    /**
     * Set Description
     *
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        return $this->setData(EntityInterface::DESCRIPTION, $description);
    }

    /**
     * Get Is Active
     *
     * @return bool|int
     */
    public function getIsActive()
    {
        return $this->getData(EntityInterface::IS_ACTIVE);
    }

    /**
     * Set Is Active
     *
     * @param $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        return $this->setData(EntityInterface::IS_ACTIVE, $isActive);
    }

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getData(EntityInterface::IMAGE);
    }
    /**
     * Set Image
     *
     * @param $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(EntityInterface::IMAGE, $image);
    }

    /**
     * Get Price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->getData(EntityInterface::PRICE);
    }

    /**
     * Set Price
     *
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setData(EntityInterface::PRICE, $price);
    }

    /**
     * Get Created At
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(EntityInterface::CREATED_AT);
    }

    /**
     * Set Created At
     *
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(EntityInterface::CREATED_AT, $createdAt);
    }

    /**
     * Get Updated At
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(EntityInterface::UPDATED_AT);
    }

    /**
     * Set Updated At
     *
     * @param $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(EntityInterface::UPDATED_AT, $updatedAt);
    }
}
