<?php style('grauphel', 'grauphel'); ?>

<?php /** @var $l OC_L10N */ ?>
<?php echo $_['appNavigation']; ?>

<div id="app-content" class="content">
    <h1><?php p($l->t('Grauphel settings')); ?></h1>
    <p><?php p($l->t('Manage Grauphel access and database settings.')); ?></p>
    <ul>
        <li><a href="<?php p($_['urlGen']->linkToRoute('grauphel.gui.tokens')); ?>"><?php p($l->t('Manage access tokens')); ?></a></li>
        <li><a href="<?php p($_['urlGen']->linkToRoute('grauphel.gui.database')); ?>"><?php p($l->t('Manage database')); ?></a></li>
    </ul>

    <?php if (isset($_['stats'])) { echo $_['stats']; } ?>
</div>
