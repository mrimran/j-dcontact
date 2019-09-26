<?php

/*------------------------------------------------------------------------
# J DContact
# ------------------------------------------------------------------------
# author                Md. Shaon Bahadur
# copyright             Copyright (C) 2014 j-download.com. All Rights Reserved.
# @license -            http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';

    modJdcontactHelper::preLoadprocess($params);
    $layout = JModuleHelper::getLayoutPath('mod_jdcontact');

	require($layout);

?>