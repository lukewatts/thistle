<?php
namespace Thistle\App\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\Htaccess\Htaccess;

/**
 * ------------------------------------------------------------
 * Class GenerateHtaccessCommand
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Command
 */
class GenerateHtaccessCommand extends Command
{
    /**
     * ------------------------------------------------------------
     * Configure
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     */
    protected function configure()
    {
        $this->setName('generate:htaccess')
            ->setDescription('Generate .htaccess file and set the RewriteBase')
            ->addArgument('rewrite_base', InputArgument::REQUIRED, 'The RewriteBase value to be set (e.g. /)');
    }

    /**
     * ------------------------------------------------------------
     * Execute
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.8
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity = new Htaccess($input->getArgument('rewrite_base'));
        $entity->save(new Filesystem());
    }
}
