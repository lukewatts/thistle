<?php
/**
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 */
namespace Thistle\App\Core\Console;

use Symfony\Component\Console;
use Thistle\App\Core\Console\Command;

$thistleConsole = new Console\Application();

$thistleConsole->add(new Command\GenerateEntityCommand());
$thistleConsole->add(new Command\GenerateControllerCommand());
$thistleConsole->add(new Command\GenerateViewCommand());
$thistleConsole->add(new Command\GenerateHtaccessCommand());

$thistleConsole->run();