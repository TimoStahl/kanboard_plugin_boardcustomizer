<?php

namespace Kanboard\Plugin\BoardCustomizer\Controller;

use Kanboard\Controller\BaseController;

/**
 * Project Analytic Controller
 *
 * @package  Kanboard\Controller
 * @author   Frederic Guillot
 */
class SettingsController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();
        //$metadata = $this->userMetadataModel->getAll($user['id']);
        $options = [
            'Material Card' => 'boardcustomizer_materialcard',
            'Only show one column header' => 'boardcustomizer_onlyfirstcolumnheaders'
        ];

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
