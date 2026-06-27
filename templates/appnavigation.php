<?php script('grauphel', 'grauphel'); ?>

<div id="app-navigation">
  <ul>
    <?php foreach ($_['tags'] as $tag) { ?>
      <li data-id="<?php p($tag['id']) ?>" <?php $tag['selected'] && print ' class="selected"'; ?>><a href="<?php p(isset($tag['href']) ? $tag['href'] : '#') ?>"><?php p($tag['name']);?></a></li>
    <?php } ?>
  </ul>

  <div id="app-settings">
    <div id="app-settings-header">
      <a href="<?php p($_['urlGen']->linkToRoute('grauphel.gui.settings')); ?>" class="settings-button" aria-label="Grauphel settings">⚙ Settings</a>
    </div>
  </div>
</div>
