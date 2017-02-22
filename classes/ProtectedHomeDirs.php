<?php

namespace HeimrichHannot\ProtectedHomeDirs;

use HeimrichHannot\Haste\Model\MemberModel;
use HeimrichHannot\Haste\Util\Files;
use HeimrichHannot\Haste\Util\StringUtil;

class ProtectedHomeDirs extends \Controller
{
    public static function checkPermissionForProtectedHomeDirs($strFile)
    {
        $strUuid = \Config::get('protectedHomeDirRoot');

        if (!$strFile)
        {
            return;
        }

        if ($strUuid && ($strProtectedHomeDirRootPath = \HeimrichHannot\HastePlus\Files::getPathFromUuid($strUuid)) !== null)
        {
            // check only if path inside the protected root dir
            if (StringUtil::startsWith($strFile, $strProtectedHomeDirRootPath))
            {
                if (FE_USER_LOGGED_IN)
                {
                    if (($objFrontendUser = \FrontendUser::getInstance()) !== null)
                    {
                        if (\Config::get('allowAccessByMemberId') && $objFrontendUser->assignProtectedDir
                            && $objFrontendUser->protectedHomeDir
                        )
                        {
                            $strProtectedHomeDirMemberRootPath = Files::getPathFromUuid($objFrontendUser->protectedHomeDir);
                            // fe user id = dir owner member id
                            if (StringUtil::startsWith($strFile, $strProtectedHomeDirMemberRootPath))
                            {
                                return;
                            }
                        }

                        if (\Config::get('allowAccessByMemberGroups'))
                        {
                            $arrAllowedGroups = deserialize(\Config::get('allowedMemberGroups'), true);

                            if (array_intersect(deserialize($objFrontendUser->groups, true), $arrAllowedGroups))
                            {
                                return;
                            }
                        }
                    }
                }

                $intNoAccessPage = \Config::get('jumpToNoAccess');
                if ($intNoAccessPage && ($objPageJumpTo = \PageModel::findByPk($intNoAccessPage)) !== null)
                {
                    \Controller::redirect(\Controller::generateFrontendUrl($objPageJumpTo->row()));
                }
                else
                {
                    die($GLOBALS['TL_LANG']['MSC']['noAccessDownload']);
                }
            }
        }
    }

    public static function getProtectedHomeDirRoot()
    {
        $strUuid = \Config::get('protectedHomeDirRoot');

        if ($strUuid)
        {
            return Files::getPathFromUuid($strUuid);
        }

        return false;
    }

    public static function getProtectedHomeDir($varMember, $blnOverwrite = false)
    {
        $strPath = static::getProtectedHomeDirRoot();

        if ($strPath)
        {
            return MemberModel::getHomeDir($varMember, 'assignProtectedDir', 'protectedHomeDir', $strPath, $blnOverwrite);
        }
        else
        {
            return false;
        }
    }

    public static function addProtectedHomeDir($varMember, $blnOverwrite = false)
    {
        $strPath = static::getProtectedHomeDirRoot();

        if ($strPath)
        {
            return MemberModel::addHomeDir($varMember, 'assignProtectedDir', 'protectedHomeDir', $strPath, $blnOverwrite);
        }
        else
        {
            return false;
        }
    }
}