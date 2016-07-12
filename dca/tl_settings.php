<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_settings'];

/**
 * Palettes
 */
$arrDca['palettes']['default'] .= ';{homedir_legend},protectedHomeDirRoot,jumpToNoAccess,allowAccessByMemberId,allowAccessByMemberGroups';

/**
 * Subpalettes
 */
$arrDca['palettes']['__selector__'][] = 'allowAccessByMemberGroups';
$arrDca['subpalettes']['allowAccessByMemberGroups'] = 'allowedMemberGroups';

/**
 * Fields
 */
$arrFields = array(
	'protectedHomeDirRoot' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['protectedHomeDirRoot'],
		'exclude'                 => true,
		'inputType'               => 'fileTree',
		'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'w50')
	),
	'jumpToNoAccess' => array(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['jumpToNoAccess'],
		'exclude'                 => true,
		'inputType'               => 'pageTree',
		'eval'                    => array('fieldType'=>'radio', 'tl_class' => 'w50')
	),
	'allowAccessByMemberId' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['allowAccessByMemberId'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class' => 'w50 clr')
	),
	'allowAccessByMemberGroups' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['allowAccessByMemberGroups'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange' => true, 'tl_class' => 'w50')
	),
	'allowedMemberGroups' => array
	(
		'label'      => &$GLOBALS['TL_LANG']['tl_calendar_events']['allowedMemberGroups'],
		'inputType'  => 'select',
		'exclude'    => true,
		'eval'       => array('tl_class' => 'w50', 'multiple' => true, 'mandatory' => true, 'chosen' => true),
		'foreignKey' => 'tl_member_group.name',
		'sql'        => "int(16) NOT NULL"
	)
);

$arrDca['fields'] += $arrFields;