<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


// DIRTY HACK //
require_once JPATH_SITE . '/components/com_users/models/login.php';
require_once JPATH_SITE . '/components/com_users/models/registration.php';

require __DIR__ . '/../login/default_login.php';
