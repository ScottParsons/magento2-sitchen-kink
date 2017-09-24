<?php
/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
namespace Turiknox\SitchenKink\Model\Config\Source;

class Dropdown implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'option_1', 'label' => __('Option 1')],
            ['value' => 'option_2', 'label' => __('Option 2')],
            ['value' => 'option_3', 'label' => __('Option 3')],
            ['value' => 'option_4', 'label' => __('Option 4')]
        ];
    }
}
