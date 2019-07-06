<li <?= $this->app->checkMenuSelection('SettingsController', 'showSettings') ?>>
    <?= $this->url->link(t('My display settings'), 'SettingsController', 'showSettings', array('plugin' => 'boardcustomizer')) ?>
</li>