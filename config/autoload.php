<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package Protected_homedirs
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(
    [
	'HeimrichHannot',]
);


/**
 * Register the classes
 */
ClassLoader::addClasses(
    [
	// Classes
	'HeimrichHannot\ProtectedHomeDirs\ProtectedHomeDirs' => 'system/modules/protected_homedirs/classes/ProtectedHomeDirs.php',]
);
