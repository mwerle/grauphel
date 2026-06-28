<?php script('grauphel', 'grauphel'); ?>

<div id="app-navigation">
  <ul>
    <?php foreach ($_['tags'] as $tag) { ?>
      <li data-id="<?php p($tag['id']) ?>" <?php $tag['selected'] && print ' class="selected"'; ?>><a href="<?php p($tag['href']) ?>"><?php p($tag['name']); ?></a></li>
    <?php } ?>
  </ul>

  <div id="app-settings">
	<ul>
	<li><div id="app-settings-header">Notes: <?php p($_['notes_count']); ?></div></li>
	<li><div id="app-settings-header">Tags: <?php p($_['tags_count']); ?></div></li>
    <li><div id="app-settings-header">
      <a href="<?php p($_['urlGen']->linkToRoute('grauphel.gui.settings')); ?>" class="settings-button" aria-label="Grauphel settings">Grauphel settings</a>
    </div></li>
</ul>
  </div>
</div>
