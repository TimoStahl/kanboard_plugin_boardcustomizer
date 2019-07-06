<?php
namespace Kanboard\Plugin\BoardCustomizer;
use Kanboard\Core\Plugin\Base;
class Plugin extends Base
{
    public function initialize()
    {
        //$this->hook->on('template:layout:css', array('template' => 'plugins/BoardCustomizer/style.css'));

        $this->template->hook->attach('template:layout:head', 'boardcustomizer:layout/head');
        $this->template->hook->attach('template:project:dropdown', 'boardcustomizer:project/dropdown');        
        $this->template->hook->attach('template:user:sidebar:information', 'boardcustomizer:user/sidebar');

    }
    public function getPluginName()
    {
        return 'BoardCustomizer';
    }
    public function getPluginDescription()
    {
        return t('Customize board and card style');
    }
    public function getPluginAuthor()
    {
        return 'BlueTeck';
    }
    public function getPluginVersion()
    {
        return '0.0.1';
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