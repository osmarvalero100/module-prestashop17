<?php

if (!defined('_PS_VERSION_')) {
  exit;
}

/**
 * Módulo de ejemplo para Prestashop 1.7
 */
class Ejemplo extends Module
{

  public function __construct()
  {
    $this->name = 'ejemplo'; //mismo nombre de la carpeta del módulo
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'Osmar Valero';
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    $this->displayName = 'Módulo de ejemplo';
    $this->description = 'Módulo de jemplo para prestashop 1,7';
    parent::__construct();
  }

  public function install()
  {
    if (!parent::install() ||
        !Configuration::updateValue('NUEVA_VARIABLE', 'Contenido de la variable'))
      return false;
    return true;
  }
  public function uninstall()
  {
    if (!parent::uninstall() ||
        !Configuration::deleteByName('NUEVA_VARIABLE'))
      return false;
    return true;
  }
}
