<?php

/*
 * Set Plugin dir in Globals
 */
$GLOBALS["foundPlugins"]["botshop"]["plugindir"] = __DIR__;
$GLOBALS["foundPlugins"]["botshop"]["pluginver"] = "1.0";

require ("Classes/EthereumDriver/GenerateEthereumWallet.php");
require ("Controller/botshop.class.php");
require ("Controller/OrderApi.class.php");
//Botshop
//case when kind = 1 then 1 else 0 end
// sum(IFNULL( case when botshop_orders.payed = 1 then botshop_orders.coinstopay else 0 end, 0))

if(!empty($_SESSION["darkrat_userid"])) {
    $AddController = new Botshop();
    $AddController->options();
}

register_settings_tab("Botshop",false,get_plugin_base_dir("botshop")."/template/Botshop/options.tpl");

$router->all('/checkfunctions', 'OrderApi@checkFunctions');
$router->all('/createoder', 'OrderApi@createoder');
$router->all('/checkorder', 'OrderApi@checkorder');
$router->all('/detils', 'OrderApi@detils');
$router->all('/fetchpricelist', 'OrderApi@fetchPriceList');

$router->all('/editapi/(\d+)', 'Botshop@editapi');
$router->all('/botshopprice', 'Botshop@botshopprice');
?>