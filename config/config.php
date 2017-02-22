<?php

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['postDownload']['checkPermissionForProtectedHomeDirs'] = [
	'HeimrichHannot\\ProtectedHomeDirs\\ProtectedHomeDirs', 'checkPermissionForProtectedHomeDirs'
];