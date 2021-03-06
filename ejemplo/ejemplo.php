<?php

if (!defined('_PS_VERSION_')) {
  exit;
}

/**
 * Módulo de ejemplo para Prestashop 1.7
 * iconos: https://www.fatcow.com/free-icons
 */
class Ejemplo extends Module
{

  public function __construct()
  {
    $this->name = 'ejemplo'; //mismo nombre de la carpeta del módulo
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'Osmar Valero';
    $this->bootstrap = true;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    $this->displayName = 'Módulo de ejemplo';
    $this->description = 'Módulo de ejemplo para prestashop 1.7';
    parent::__construct();
  }

  public function install()
  {
    if (!parent::install() ||
    !Configuration::updateValue('EXAMPLE_VAR', 'Contenido de la variable') ||
    !$this->registerHook('displayReassurance') ||
    !$this->registerHook('displayFooter') ||
    !$this->registerHook('ejemploCustomHook')) {
      return false;
    } else {
      return true;
    }
  }
  public function uninstall()
  {
    if (!parent::uninstall() ||
    !Configuration::deleteByName('EXAMPLE_VAR')){
      return false;
    } else {
      return true;
    }
  }
  /*
  * Muestra el botón configurar módulo
  */
  public function getContent()
  {
    $this->smarty->assign('save', false);
    if (Tools::isSubmit('submitEjemplo')) {
      $myVar = Tools::getValue('newVar');
      Configuration::updateValue('EXAMPLE_VAR', $myVar);
      $this->smarty->assign('save', true);
    }
    $varValue = Configuration::get('EXAMPLE_VAR');
    $this->smarty->assign('varValue', $varValue);
    return $this->display(__FILE__, 'configure.tpl');
  }
  /*
  * Insertará este Hook en la página de producto
  */
  public function hookDisplayReassurance($params)
  {
    return $this->display(__FILE__, 'productAdditionalInfo.tpl');
  }
  /*
  * Hook personalizado
  */
  public function hookEjemploCustomHook($params) {
    return $this->display(__FILE__, 'customHook.tpl');
  }
  /*
  * Insertará este Hook en el pie de página
  */
  public function hookDisplayFooter($params) {
    $varValue = Configuration::get('EXAMPLE_VAR');
    $this->context->smarty->assign('varValue', $varValue);
    return $this->display(__FILE__, 'footer.tpl');
  }
}
