<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


// DIRTY HACK //
require_once JPATH_SITE . '/components/com_users/models/login.php';
require_once JPATH_SITE . '/components/com_users/models/registration.php';

$ul = new UsersModelLogin();
$ur = new UsersModelRegistration();

$loginform = $ul->getForm();
$registrationform = $ur->getForm();

$baseLayoutPath = JPATH_ROOT . '/media/pagestreet/layouts';
$displayData 	= new stdClass;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<div class="com_login">
	<div class="headdds">Anmelden |&nbsp;Registrieren</div>
	<div class="longline"></div>
	<img width="64" alt="53f60fcef9e528193c8c8bf5_lock2.png"
		 src="http://uploads.webflow.com/53d639404c2a19f91f1a2c29/53f60fcef9e528193c8c8bf5_lock2.png"
		 class="log-icon">
	<div class="row lpage">
		<div class="col-md-6 log">
			<div class="logwrap">
				<div class="login-haeder log">Bereits Registriert</div>
				<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-horizontal">
					<?php
					$fields = ['username', 'password'];
					?>
					<?php foreach ($fields as $f) : ?>
						<?php $displayData->field = $f; ?>
						<?php $displayData->label = $loginform->getLabel($f); ?>
						<?php $displayData->input = $loginform->getInput($f); ?>
						<?php echo JLayoutHelper::render('form.login', $displayData, $baseLayoutPath); ?>
						<?php unset($displayData);$displayData 	= new stdClass;?>
					<?php endforeach; ?>

						<div class="controls">
							<button type="submit" class="btn btn-pagestreet">
								<?php echo JText::_('JLOGIN'); ?>
							</button>
						</div>

						<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
						<?php echo JHtml::_('form.token'); ?>
					</fieldset>
				</form>
			</div>
		</div>
		<div class="col-md-6 reg">
			<div class="regwrap">
				<div class="login-haeder">neu registrieren</div>

				<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
					<?php
					$fields = ['name', 'username', 'password1', 'password2', 'email1', 'email2'];
					?>
					<?php foreach ($fields as $f) : ?>
							<?php $displayData->field = $f; ?>
							<?php $displayData->label = $registrationform->getLabel($f); ?>
							<?php $displayData->input = $registrationform->getInput($f); ?>
							<?php echo JLayoutHelper::render('form.login', $displayData, $baseLayoutPath); ?>
							<?php unset($displayData);$displayData 	= new stdClass;?>
					<?php endforeach; ?>

					<div class="form-actions">
						<button type="submit" class="btn btn-pagestreet validate"><?php echo JText::_('JREGISTER');?></button>

						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
						<?php echo JHtml::_('form.token');?>
					</div>
				</form>
		</div>
	</div>
	</div>
</div>