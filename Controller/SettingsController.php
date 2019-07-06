<?php

namespace Kanboard\Plugin\BoardCustomizer\Controller;

use Kanboard\Controller\BaseController;

class SettingsController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();

        $options = [
            'Board: only show first column header' => 'boardcustomizer_onlyfirstcolumnheaders',
            'Board: decent hidden column' => 'boardcustomizer_optimizehiddencolumn',
            'Board: top selection without scollbar' => 'boardcustomizer_topnavhiddenscrollbar',
            'Card: material design' => 'boardcustomizer_materialcard',
            'Card: hide task priority' => 'boardcustomizer_hidetaskpriority',
            'Card: hide task age' => 'boardcustomizer_hidetaskage',
            'Card: white background' => 'boardcustomizer_whitebackground'
        ];

        // additional options is other plugin is installed
        $pluginFGroupAssign = PLUGINS_DIR . DIRECTORY_SEPARATOR . basename('Group_assign');
        if (file_exists($pluginFGroupAssign)) {
            $plugin_groupassign = [
                'Card: hide group labels' => 'boardcustomizer_groupassign_hidecardlabels'
            ];
            $options = array_merge($options, $plugin_groupassign);
        }

        $this->response->html($this->helper->layout->user('boardcustomizer:user/settings', [
            'title' => t('Display settings'),
            'user'                                                                   => $user,
            'options'                                                               => $options,
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
