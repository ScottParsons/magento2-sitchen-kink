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

use Magento\Framework\Api\SearchResultsInterface;

interface EntitySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get entity list.
     *
     * @return \Turiknox\SitchenKink\Api\Data\EntityInterface[]
     */
    public function getItems();

    /**
     * Set entity list.
     *
     * @param \Turiknox\SitchenKink\Api\Data\EntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
