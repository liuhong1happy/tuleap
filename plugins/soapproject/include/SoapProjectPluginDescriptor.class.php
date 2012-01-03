<?php
/**
 * Copyright (c) Enalean, 2011. All Rights Reserved.
 *
 * This file is a part of Codendi.
 *
 * Codendi is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Codendi is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Codendi; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require_once 'common/plugin/PluginDescriptor.class.php';

/**
 * SoapProjectPluginDescriptor
 */
class SoapProjectPluginDescriptor extends PluginDescriptor {

    function __construct() {
        parent::__construct($GLOBALS['Language']->getText('plugin_soapproject', 'descriptor_name'), false, $GLOBALS['Language']->getText('plugin_soapproject', 'descriptor_description'));
        $this->setVersionFromFile(dirname(__FILE__).'/../VERSION');
    }
}
?>