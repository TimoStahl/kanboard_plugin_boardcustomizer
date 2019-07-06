<?php if ($this->user->isAdmin()) {
    ?>
    <li>
        <?= $this->url->link(t('Display settings'), 'SettingsController', 'showSettings', array('plugin' => 'boardcustomizer')) ?>
    </li>
<?php 
} ?>