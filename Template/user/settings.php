<div class="page-header">
    <h2><?= t('My display settings') ?></h2>
</div>


<?php if (empty($options)) : ?>
    <p class="alert"><?= t('No options') ?></p>
<?php else : ?>
    <table class="table-small table-fixed">
        <tr>
            <th class="column-40"><?= t('Option') ?></th>
            <th class="column-40"><?= t('Status') ?></th>
        </tr>
        <form name="settings" id="settings" class="url-links" method="post" action="<?= $this->url->href('SettingsController', 'save', array('plugin' => 'boardcustomizer', 'redirect' => 'application')) ?>" autocomplete="off">
        <?php foreach ($options as $option => $key) : ?>
            <tr>
                <td>
                    <?= $option ?>
                </td>
                <td>
                    <?php if ($key == 'boardcustomizer_avatardyn') : ?>
                        <input type="range" name="b_av_size" id="b_av_size" min="20" max="50" value="<?= $this->task->configModel->get('b_av_size','20') ?>" oninput="this.nextElementSibling.value = this.value">
                        <output><?= $this->task->configModel->get('b_av_size','20') ?></output> <?= t('pixels') ?><br>
                        <input type="range" name="b_av_radius" id="b_av_radius" min="0" max="50" value="<?= $this->task->configModel->get('b_av_radius','20') ?>" oninput="this.nextElementSibling.value = this.value">
                        <output><?= $this->task->configModel->get('b_av_radius','20') ?></output> <?= t('percent') ?>
                    <?php else : ?>
                        <?php if ($this->user->userMetadataModel->exists($user['id'], $key)) : ?>
                            <?= $this->url->icon('toggle-off', t('Disable'), 'SettingsController', 'disable', array('plugin' => 'boardcustomizer', 'key' => $key), true) ?>
                        <?php else : ?>
                            <?= $this->url->icon('toggle-on', t('Enable'), 'SettingsController', 'enable', array('plugin' => 'boardcustomizer', 'key' => $key), true) ?>
                        <?php endif ?>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<button type="submit" name="save" value="save" class="btn btn-blue"><?= t('Save') ?> </button></form>
<?php endif ?>
