<p><?php echo __('Use this page to set up the connection details for your LDAP or Active Directory server. The user you select here will need access to the user list, so the username and password users log in with can be verified, but no write access is necessary.'); ?></p>
<div class="rounded_box red" style="margin-top: 5px">
	<div class="header"><?php echo __('Important information'); ?></div>
	<p><?php echo __('When you enable LDAP as your authentication backend in Authentication configuration, you will lose access to all accounts which do not also exist in the LDAP database. This may mean you lose administrative access.'); ?></p>
	<p style="font-weight: bold; padding-top: 5px"><?php echo __('To resolve this issue, either import all users using the tool on this page and make one an administrator using Users configuration, or create a user with the same username as one in LDAP and make that one an administrator.'); ?></p>
</div>
<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('configure_module', array('config_module' => $module->getName())); ?>" enctype="multipart/form-data" method="post">
	<div class="rounded_box borderless mediumgrey<?php if ($access_level == TBGSettings::ACCESS_FULL): ?> cut_bottom<?php endif; ?>" style="margin: 10px 0 0 0; width: 700px;<?php if ($access_level == TBGSettings::ACCESS_FULL): ?> border-bottom: 0;<?php endif; ?>">
		<div class="header"><?php echo __('Connection details'); ?></div>
		<table style="width: 680px;" class="padded_table" cellpadding=0 cellspacing=0 id="vcsintegration_settings_table">
			<tr>
				<td style="padding: 5px;"><label for="hostname"><?php echo __('Hostname'); ?></label></td>
				<td><input type="text" name="hostname" id="hostname" value="<?php echo $module->getSetting('hostname'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="port"><?php echo __('Port'); ?></label></td>
				<td><input type="text" name="port" id="port" value="<?php echo $module->getSetting('port'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="username"><?php echo __('Username'); ?></label></td>
				<td><input type="text" name="username" id="username" value="<?php echo $module->getSetting('username'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="password"><?php echo __('Password'); ?></label></td>
				<td><input type="password" name="password" id="password" value="<?php echo $module->getSetting('password'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td class="config_explanation" colspan="2"><?php echo __('Warning: The password will be stored unencrypted in the database.'); ?></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="dn"><?php echo __('Base DN'); ?></label></td>
				<td><input type="text" name="dn" id="dn" value="<?php echo $module->getSetting('dn'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td class="config_explanation" colspan="2"><?php echo __('This should be the DN string for the OU containing the user list. For example, OU=People,OU=staff,DN=ldap,DN=example,DN=com.'); ?></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="groups"><?php echo __('Allowed groups'); ?></label></td>
				<td><input type="text" name="groups" id="groups" value="<?php echo $module->getSetting('groups'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td class="config_explanation" colspan="2"><?php echo __('You may wish to restrict access to users who belong to certain groups in LDAP. If so, write a comma separated list of group names here. Leave blank to disable this feature.'); ?></td>
			</tr>
		</table>
	</div>
<?php if ($access_level == TBGSettings::ACCESS_FULL): ?>
	<div class="rounded_box iceblue borderless cut_top" style="margin: 0 0 5px 0; width: 700px; border-top: 0; padding: 8px 5px 2px 5px; height: 25px;">
		<div style="float: left; font-size: 13px; padding-top: 2px;"><?php echo __('Click "%save%" to save the settings', array('%save%' => __('Save'))); ?></div>
		<input type="submit" id="submit_settings_button" style="float: right; padding: 0 10px 0 10px; font-size: 14px; font-weight: bold;" value="<?php echo __('Save'); ?>">
	</div>
<?php endif; ?>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('ldap_test'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey" style="margin: 10px 0 0 0; width: 700px; padding: 5px 5px 30px 5px;">
		<div class="header"><?php echo __('Test connection'); ?></div>
		<div class="content"><?php echo __('After configuring and saving your connection settings, you should test your connection to the LDAP server. This test does not check whether the DN can correctly find users, but it will give an indication if The Bug Genie can talk to your LDAP server.'); ?></div>
		<input type="submit" id="test_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Test connection'); ?>">
	</div>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('ldap_import'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey" style="margin: 10px 0 0 0; width: 700px; padding: 5px 5px 30px 5px;">
		<div class="header"><?php echo __('Import all users'); ?></div>
		<div class="content"><?php echo __('So that you can ensure all users from LDAP exist in The Bug Genie exist for initial configuration (e.g. to set permissions), you can import all users who don\'t already exist using this tool. If you set a group restriction, this will be obyed here. Remember to make at least one an administrator so you can continue to configure The Bug Genie after switching.'); ?></div>
		<input type="submit" id="import_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Import users'); ?>">
	</div>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('ldap_prune'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey" style="margin: 10px 0 0 0; width: 700px; padding: 5px 5px 30px 5px;">
		<div class="header"><?php echo __('Prune users'); ?></div>
		<div class="content"><?php echo __('If a user is deleted from LDAP then they will not be able to log into The Bug Genie. However if you want to remove users from The Bug Genie who have been deleted from LDAP you may wish to prune the users list. This action will delete all users from The Bug Genie\'s user list who do not exist in the LDAP database, and can not be reversed.'); ?></div>
		<input type="submit" id="prune_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Prune users'); ?>">
	</div>
</form>