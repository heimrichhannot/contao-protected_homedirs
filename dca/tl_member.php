<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_member'];

/**
 * Palettes
 */
$arrDca['palettes']['default'] = str_replace('assignDir', 'assignDir,assignProtectedDir', $arrDca['palettes']['default']);

/**
 * Subpalettes
 */
$arrDca['palettes']['__selector__'][] = 'assignProtectedDir';
$arrDca['subpalettes']['assignProtectedDir'] = 'protectedHomeDir';

/**
 * Fields
 */
$arrDca['fields']['assignProtectedDir'] = $arrDca['fields']['assignDir'];
$arrDca['fields']['assignProtectedDir']['label'] = &$GLOBALS['TL_LANG']['tl_member']['assignProtectedDir'];

$arrDca['fields']['protectedHomeDir'] = $arrDca['fields']['homeDir'];
$arrDca['fields']['protectedHomeDir']['label'] = &$GLOBALS['TL_LANG']['tl_member']['protectedHomeDir'];
if (\Config::get('protectedHomeDirRoot'))
	$arrDca['fields']['protectedHomeDir']['eval']['path'] =
		\HeimrichHannot\HastePlus\Files::getPathFromUuid(\Config::get('protectedHomeDirRoot'));