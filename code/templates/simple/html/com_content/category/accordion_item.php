<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

$id = $this->item->id;
?>

<div class="panel-heading" role="tab" id="heading<?php echo $id; ?>">
    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>">
        <h3 class="panel-title">
            <?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?>

            <?php echo $this->item->event->afterDisplayTitle; ?>

            <div class="subtext">
                <?php echo $this->item->introtext; ?>
            </div>
        </h3>
    </a>
</div>
<div id="collapse<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>">
    <div class="panel-body">
        <?php echo $this->item->event->beforeDisplayContent; ?>
        <?php echo $this->item->fulltext; ?>
    </div>
</div>
<?php echo $this->item->event->afterDisplayContent; ?>
