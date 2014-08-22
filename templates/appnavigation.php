<div id="app-navigation">
  <ul>
    <?php foreach ($_['tags'] as $tag) { ?>
      <li data-id="<?php p($tag['id']) ?>"><a href="<?php p(isset($tag['href']) ? $tag['href'] : '#') ?>"><?php p($tag['name']);?></a></li>
    <?php } ?>
  </ul>

  <div id="app-settings">
    <div id="app-settings-header">
      <button class="settings-button" data-apps-slide-toggle="#app-settings-content"></button>
    </div>
    <div id="app-settings-content" style="display: none;">
      <h2><?php p($l->t('Tomboy note server'));?></h2>
      <em><?php print_unescaped($l->t('Use the following sync server URL with tomboy/conboy/tomdroid:')); ?></em>
      <div><input id="resturl" type="text" readonly="readonly" value="<?php p($_['apiroot']); ?>" /></div>
    </div>
  </div>
</div>
