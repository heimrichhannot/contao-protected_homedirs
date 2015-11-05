<?php

namespace HeimrichHannot\ProtectedHomeDirs;

class ProtectedHomeDirs extends \Controller
{
	public static function checkPermissionForProtectedHomeDirs($strFile)
	{
		$strUuid = \Config::get('protectedHomeDirRoot');

		if (!$strFile)
			return;

		if ($strUuid && ($strProtectedHomeDirRootPath = \HeimrichHannot\HastePlus\Files::getPathFromUuid($strUuid)) !== null)
		{
			$intPos = strpos($strFile, ltrim($strProtectedHomeDirRootPath, '/'));

			if ($intPos !== false && $intPos == 0)
			{
				if (\Config::get('allowAccessByMemberId') &&
					($objFolder = \FilesModel::findByPath(rtrim(str_replace(basename($strFile), '', $strFile), '/'))) !== null)
				{
					$objMember = \MemberModel::findBy('protectedHomeDir', $objFolder->uuid);

					// fe user id = dir owner member id
					if (\FrontendUser::getInstance()->id == $objMember->id)
						return;
				}

				$intNoAccessPage = \Config::get('jumpToNoAccess');
				if ($intNoAccessPage && ($objPageJumpTo = \PageModel::findByPk($intNoAccessPage)) !== null)
				{
					\Controller::redirect(\Controller::generateFrontendUrl($objPageJumpTo->row()));
				}
				else
					die($GLOBALS['TL_LANG']['MSC']['noAccessDownload']);
			}
		}
	}
}