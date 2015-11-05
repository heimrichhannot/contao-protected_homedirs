<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['postDownload']['checkPermissionForProtectedHomeDirs'] = array(
	'HeimrichHannot\\ProtectedHomeDirs\\ProtectedHomeDirs', 'checkPermissionForProtectedHomeDirs'
);