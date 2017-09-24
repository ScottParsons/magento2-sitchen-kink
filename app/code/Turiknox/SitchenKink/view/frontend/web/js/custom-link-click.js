/*
 * Turiknox_SitchenKink

 * @category   Turiknox
 * @package    Turiknox_SitchenKink
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento2-sitchen-kink/blob/master/LICENSE.md
 * @version    1.0.1
 */
define([
    "jquery"
], function($) {
    "use strict";

    $.widget('sitchenkink.customLinkClick', {
        _create: function() {
            this.element.on('click', function(e){
                e.preventDefault();
                alert('Add some onClick functionality here.');
            });
        }

    });
    return $.sitchenkink.customLinkClick;
});
