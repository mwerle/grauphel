<?php script('grauphel', 'grauphel'); ?>

<div id="app-navigation">
  <!-- Tags list -->
   <div class="app-navigation-header">Tags</div>
  <ul class="app-navigation-list">
    <?php foreach ($_['tags'] as $tag) { ?>
      <li class="app-navigation-entry <?php $tag['selected'] && print 'selected' ?>"
          data-id="<?php p($tag['id']) ?>">
        <a href="<?php p($tag['href']) ?>"><?php p($tag['name']); ?></a>
      </li>
    <?php } ?>
  </ul>

  <!-- Statistics -->
  <div class="app-navigation-info">
    <ul>
      <li>Notes: <?php p($_['notes_count']); ?></li>
      <li>Tags: <?php p($_['tags_count']); ?></li>
  </ul>
  </div>

  <!-- Settings button -->
  <div id="app-settings">
    <ul>
      <li><div id="app-settings-header">
        <a href="<?php p($_['urlGen']->linkToRoute('grauphel.gui.settings')); ?>"
           class="settings-button" aria-label="Grauphel settings">Grauphel settings</a>
      </div></li>
    </ul>
  </div>
</div>
