<?php

namespace Kanboard\Plugin\BoardCustomizer\Controller;

use Kanboard\Controller\BaseController;

class SettingsController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();

        $options = [
            t('Board: only show first column header') => 'boardcustomizer_onlyfirstcolumnheaders',
            t('Board: top selection without scollbar') => 'boardcustomizer_topnavhiddenscrollbar',
            t('Card: material design') => 'boardcustomizer_materialcard',
            t('Card: white background') => 'boardcustomizer_whitebackground',
            t('Card: hide owner name') => 'boardcustomizer_hideownername',
            t('Card: hide category') => 'boardcustomizer_hidecategory',
            t('Card: hide tags') => 'boardcustomizer_hidetags',
            t('Card: hide all footer icons') => 'boardcustomizer_hidefooter',
            t('Card: hide task priority') => 'boardcustomizer_hidetaskpriority',
            t('Card: hide task age') => 'boardcustomizer_hidetaskage',
            t('Card: hide reference') => 'boardcustomizer_hidereference',
            t('Card: hide score') => 'boardcustomizer_hidescore',
            t('Card: hide time estimated') => 'boardcustomizer_hidetimeestimated',
            t('Card: hide task date') => 'boardcustomizer_hidetaskdate'
        ];

        // additional options is other plugin is installed
        $pluginFGroupAssign = PLUGINS_DIR . DIRECTORY_SEPARATOR . basename('Group_assign');
        if (file_exists($pluginFGroupAssign)) {
            $plugin_groupassign = [
                t('Card: hide group labels') => 'boardcustomizer_groupassign_hidecardlabels'
            ];
            $options = array_merge($options, $plugin_groupassign);
        }

        $this->response->html($this->helper->layout->user('boardcustomizer:user/settings', [
            'title'   => t('My display settings'),
            'user'    => $user,
            'options' => $options,
        ]));
    }

    public function disable()
    {
        $user = $this->getUser();
        $key = $this->request->getStringParam('key');
        $this->userMetadataModel->remove($user['id'], $key);
        return $this->response->redirect($this->helper->url->to('SettingsController', 'showSettings', ['plugin' => 'boardcustomizer']), true);
    }

    public function enable()
    {
        $user = $this->getUser();
        $key = $this->request->getStringParam('key');
        $this->userMetadataModel->save($user['id'], [$key => true]);
        return $this->response->redirect($this->helper->url->to('SettingsController', 'showSettings', ['plugin' => 'boardcustomizer']), true);
    }
}
