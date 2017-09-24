<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Api\Data;

interface EntityInterface
{
    const ENTITY_ID    = 'entity_id';
    const NAME         = 'name';
    const DESCRIPTION  = 'description';
    const IMAGE        = 'image';
    const PRICE        = 'price';
    const IS_ACTIVE    = 'is_active';
    const CREATED_AT   = 'created_at';
    const UPDATED_AT   = 'updated_at';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Set ID
     *
     * @param $id
     * @return EntityInterface
     */
    public function setEntityId($id);

    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name
     *
     * @param $name
     * @return EntityInterface
     */
    public function setName($name);

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set Description
     *
     * @param $description
     * @return EntityInterface
     */
    public function setDescription($description);

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage();

    /**
     * Set Image
     *
     * @param $image
     * @return EntityInterface
     */
    public function setImage($image);

    /**
     * Get Price
     *
     * @return float
     */
    public function getPrice();

    /**
     * Set Price
     *
     * @param $price
     * @return EntityInterface
     */
    public function setPrice($price);

    /**
     * Get is active
     *
     * @return bool|int
     */
    public function getIsActive();

    /**
     * Set is active
     *
     * @param $isActive
     * @return EntityInterface
     */
    public function setIsActive($isActive);

    /**
     * Get created at
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * set created at
     *
     * @param $createdAt
     * @return EntityInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     *
     * @return string
     */
    public function getUpdatedAt();

    /**
     * set updated at
     *
     * @param $updatedAt
     * @return EntityInterface
     */
    public function setUpdatedAt($updatedAt);
}
