<?php
/*	Copyright 2014-2016 Zachary Doll
 *	This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2
 *  of the License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
$PluginInfo['TestingGround'] = array( // You put whatever you want to call your plugin folder as the key
   'Name' => 'Testing Ground', // User friendly name, this is what will show up on the garden plugins page
   'Description' => 'A skeleton plugin that adds its resources to every page, creates a settings page, and creates a stub minicontroller.', // This is also shown on the garden plugins page. Will be used as the first line of the description if uploaded to the official addons repository at vanillaforums.org/addons
   'Version' => '0.1', // Anything can go here, but it is suggested that you use some type of naming convention; will appear on the garden vanilla plugins page
   'RequiredApplications' => array('Vanilla' => '2.2'), // Can require multiple applications (e.g. Vanilla and Conversations)
   'RequiredTheme' => false, // Any prerequisite themes
   'RequiredPlugins' => false, // Any prerequisite plugins
   'MobileFriendly' => false, // Should this plugin be run on mobile devices?
   'HasLocale' => true, // Does this plugin have its own local file?
   'RegisterPermissions' => false, // E.g. array('Plugins.TestingGround.Manage') will register this permissions automatically on enable
   'SettingsUrl' => '/settings/testingground', // A settings button linked to this URL will show up on the garden plugins page when enabled
   'SettingsPermission' => 'Garden.Settings.Manage', // The permissions required to visit the settings page. Garden.Settings.Manage is suggested.
   'Author' => 'Zachary Doll', // This will appear in the garden plugins page
   'AuthorEmail' => 'hgtonight@daklutz.com', // So all your fans can contact you
   'AuthorUrl' => 'http://www.daklutz.com', // free advertising
   'License' => 'GPLv2', // This is required to upload to the addons directory
   'GitHub' => 'hgtonight/Plugin-TestingGround', // This is the relavent part of a GitHub link, will be linked to on the addons directory
);

class TestingGround extends Gdn_Plugin {

	// add a Testing Ground page on the settings controller
	public function settingsController_testingGround_create($sender) {
		// add the admin side menu
		$sender->addSideMenu('settings/testingground');
		
		$sender->title($this->getPluginName() . ' ' . T('Settings'));
		$sender->render($this->getView('settings.php'));
	}
	
	public function pluginController_testingGround_create($sender) {
		// Makes it act like a mini controller
		$this->dispatch($sender, $sender->RequestArgs);
	}
	
	public function controller_index($sender) {
		echo t('Plugins.TestingGround.SadTruth');
		echo "\nPlugin Index: " . $this->getPluginIndex();
		echo "\nPlugin Folder: " . $this->getPluginFolder();
	}
	
	public function base_render_before($sender) {
		$this->addResources($sender);
		// decho($sender)
	}
	
	private function addResources($sender) {
		$sender->addJsFile('testingground.js', $this->getPluginFolder(false));
		$sender->addCssFile('testingground.css', $this->getPluginFolder(false));
	}
	
	public function setup() {
		// saveToConfig('Plugins.TestingGround.EnableAdvancedMode', TRUE);
	}

	public function onDisable() {
		// removeFromConfig('Plugins.TestingGround.EnableAdvancedMode');
	}
}
