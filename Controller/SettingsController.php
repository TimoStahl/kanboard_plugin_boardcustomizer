<?php

namespace Kanboard\Plugin\BoardCustomizer\Controller;

use Kanboard\Model\ConfigModel;
use Kanboard\Model\LanguageModel;
use Kanboard\Controller\BaseController;

class SettingsController extends BaseController
{

    public function save() {
        if (isset($_POST['b_av_size'])) {
            $values = $this->request->getValues();
            $this->configModel->save(['b_av_size' => $_POST['b_av_size']]);
            $this->configModel->save(['b_av_radius' => $_POST['b_av_radius']]);
            $this->configModel->save(['av_size' => $_POST['b_av_size']]);
            $this->configModel->save(['av_radius' => $_POST['b_av_radius']]);
        }
        $values = $this->request->getValues();
        $this->languageModel->loadCurrentLanguage();
        if ($this->configModel->save($values)) {
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }
        $this->response->redirect($this->helper->url->to('SettingsController', 'showSettings', array('plugin' => 'Boardcustomizer')));
    }

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
            t('Card: hide task date') => 'boardcustomizer_hidetaskdate',
            t('Avatar size and Radius') => 'boardcustomizer_avatardyn',
            t('Compact Layout') => 'boardcustomizer_compactlayout'
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
        if ($key == 'boardcustomizer_compactlayout') {
            $this->configModel->save(['boardcustomizer_compactlayout' => 'disable']);
        }
        $this->userMetadataModel->remove($user['id'], $key);
        return $this->response->redirect($this->helper->url->to('SettingsController', 'showSettings', ['plugin' => 'boardcustomizer']), true);
    }

    public function enable()
    {
        $user = $this->getUser();
        $key = $this->request->getStringParam('key');
        if ($key == 'boardcustomizer_compactlayout') {
            $this->configModel->save(['boardcustomizer_compactlayout' => 'enable']);
        }
        $this->userMetadataModel->save($user['id'], [$key => true]);
        return $this->response->redirect($this->helper->url->to('SettingsController', 'showSettings', ['plugin' => 'boardcustomizer']), true);
    }
}
