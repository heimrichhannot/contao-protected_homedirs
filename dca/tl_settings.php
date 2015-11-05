<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_settings'];

/**
 * Palettes
 */
$arrDca['palettes']['default'] .= ';{homedir_legend},protectedHomeDirRoot,jumpToNoAccess,allowAccessByMemberId';

/**
 * Fields
 */
$arrDca['fields']['protectedHomeDirRoot'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['protectedHomeDirRoot'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'w50')
);

$arrDca['fields']['jumpToNoAccess'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['jumpToNoAccess'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'tl_class' => 'w50')
);

$arrDca['fields']['allowAccessByMemberId'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['allowAccessByMemberId'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50 clr')
);