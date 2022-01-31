<?php

namespace Kanboard\Plugin\BoardCustomizer;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:layout:head', 'boardcustomizer:layout/head');
        $this->template->hook->attach('template:project:dropdown', 'boardcustomizer:project/dropdown');
        $this->template->hook->attach('template:user:sidebar:information', 'boardcustomizer:user/sidebar');

        $this->helper->register('dynamicAvatar', '\Kanboard\Plugin\Boardcustomizer\Helper\DynamicAvatar');
        $this->template->setTemplateOverride('header/user_dropdown', 'boardcustomizer:header/user_dropdown');
        $this->template->setTemplateOverride('board/task_avatar', 'boardcustomizer:board/task_avatar');
        $this->template->setTemplateOverride('board/task_private', 'boardcustomizer:board/task_private');
        $this->template->setTemplateOverride('board/task_public', 'boardcustomizer:board/task_public');

    }
    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }
    public function getPluginName()
    {
        return 'Boardcustomizer';
    }
    public function getPluginDescription()
    {
        return t('Customize board and card style');
    }
    public function getPluginAuthor()
    {
        return 'BlueTeck, Craig Crosby, Jake G';
    }
    public function getPluginVersion()
    {
        return '1.1.0';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_boardcustomizer';
    }
    public function getCompatibleVersion()
    {
        return '>=1.2.10';
    }
}
