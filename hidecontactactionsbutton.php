<?php

require_once 'hidecontactactionsbutton.civix.php';
use CRM_Hidecontactactionsbutton_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function hidecontactactionsbutton_civicrm_config(&$config) {
  _hidecontactactionsbutton_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function hidecontactactionsbutton_civicrm_xmlMenu(&$files) {
  _hidecontactactionsbutton_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function hidecontactactionsbutton_civicrm_install() {
  _hidecontactactionsbutton_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function hidecontactactionsbutton_civicrm_postInstall() {
  _hidecontactactionsbutton_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function hidecontactactionsbutton_civicrm_uninstall() {
  _hidecontactactionsbutton_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function hidecontactactionsbutton_civicrm_enable() {
  _hidecontactactionsbutton_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function hidecontactactionsbutton_civicrm_disable() {
  _hidecontactactionsbutton_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function hidecontactactionsbutton_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _hidecontactactionsbutton_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function hidecontactactionsbutton_civicrm_managed(&$entities) {
  _hidecontactactionsbutton_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function hidecontactactionsbutton_civicrm_caseTypes(&$caseTypes) {
  _hidecontactactionsbutton_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function hidecontactactionsbutton_civicrm_angularModules(&$angularModules) {
  _hidecontactactionsbutton_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function hidecontactactionsbutton_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _hidecontactactionsbutton_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function hidecontactactionsbutton_civicrm_entityTypes(&$entityTypes) {
  _hidecontactactionsbutton_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function hidecontactactionsbutton_civicrm_themes(&$themes) {
  _hidecontactactionsbutton_civix_civicrm_themes($themes);
}

/**
 * Implements hook_civicrm_permission().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_permission
 */
function hidecontactactionsbutton_civicrm_permission(&$permissions) {
  $permissions['show contact actions'] = [
    ts('CiviCRM : Show Contact Actions'),
    ts('Shows contact actions button.'),
  ];
}

/**
 * Implements hook_civicrm_pageRun().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_pageRun
 */
function hidecontactactionsbutton_civicrm_pageRun(&$page) {
  if (is_a($page, 'CRM_Contact_Page_View_Summary')) {
    if (CRM_Core_Permission::check('show contact actions')) {
      return;
    }
    $page->assign('actionsMenuList', []);
    $page->assign('activityTypes', []);
    CRM_Core_Resources::singleton()->addScript(
      "CRM.$(function($) {
        $('div.crm-actions-ribbon ul#actions li.crm-contact-activity').remove();
      });"
    );
  }
}
