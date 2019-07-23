<div class="page-header">
    <h2><?= t('My display settings') ?></h2>
</div>


<?php if (empty($options)) : ?>
    <p class="alert"><?= t('No options') ?></p>
<?php else : ?>
    <table class="table-small table-fixed">
        <tr>
            <th class="column-40"><?= t('Option') ?></th>
            <th class="column-20"><?= t('Status') ?></th>
        </tr>
        <?php foreach ($options as $option => $key) : ?>
            <tr>
                <td>
                    <?= $option ?>
                </td>
                <td>
                    <?php if ($this->user->userMetadataModel->exists($user['id'], $key)) : ?>
                        <?= $this->url->icon('toggle-off', t('Disable'), 'SettingsController', 'disable', array('plugin' => 'boardcustomizer', 'key' => $key), true) ?>
                    <?php else : ?>
                        <?= $this->url->icon('toggle-on', t('Enable'), 'SettingsController', 'enable', array('plugin' => 'boardcustomizer', 'key' => $key), true) ?>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>