<?php

namespace Kanboard\Plugin\Boardcustomizer\Helper;

use Kanboard\Helper\AvatarHelper;
use Kanboard\Core\Base;
/**
 * Avatar Helper
 *
 * @package helper
 * @author  Craig Crosby
 */
class DynamicAvatar extends AvatarHelper
{

    public function dynamicRender($user_id, $username, $name, $email, $avatar_path, $size = 48, $css = 'avatar-left')
    {
        if (empty($user_id) && empty($username)) {
            $html = $this->avatarManager->renderDefault($size);
        } else {
            $html = $this->avatarManager->render($user_id, $username, $name, $email, $avatar_path, $size);
        }
        return '<div id="'.$css.'" class="avatar avatar-dyn '.$css.'">'.$html.'</div>';
    }

    public function dynamic($user_id, $username, $name, $email, $avatar_path, $size, $css = '')
    {
        return $this->dynamicRender($user_id, $username, $name, $email, $avatar_path, $size, $css);
    }

    public function currentUserDynamic($css = '')
    {
        $user = $this->userSession->getAll();
        return $this->dynamic($user['id'], $user['username'], $user['name'], $user['email'], $user['avatar_path'], $this->configModel->get('av_size', '20'), $css);
    }

    public function boardDynamicRender($user_id, $username, $name, $email, $avatar_path, $size = 48, $css = 'avatar-left')
    {
        if (empty($user_id) && empty($username)) {
            $html = $this->avatarManager->renderDefault($size);
        } else {
            $html = $this->avatarManager->render($user_id, $username, $name, $email, $avatar_path, $size);
        }
        return '<div id="'.$css.'" class="avatar avatar-bdyn '.$css.'">'.$html.'</div>';
    }

    public function boardDynamic($user_id, $username, $name, $email, $avatar_path, $size, $css = '')
    {
        return $this->boardDynamicRender($user_id, $username, $name, $email, $avatar_path, $size, $css);
    }

    public function boardCurrentUserDynamic($css = '')
    {
        $user = $this->userSession->getAll();
        return $this->boardDynamic($user['id'], $user['username'], $user['name'], $user['email'], $user['avatar_path'], $this->configModel->get('b_av_size', '20'), $css);
    }

 }
