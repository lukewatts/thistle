<?php
namespace Thistle\App\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\View\View;

/**
 * ------------------------------------------------------------
 * Class GenerateViewCommand
 * ------------------------------------------------------------
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.8
 *
 * @package Thistle\App\Core\Console\Command
 */
class GenerateViewCommand extends Command
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
        $this->setName('generate:view')
            ->setDescription('Creates a new view')
            ->addArgument('view', InputArgument::REQUIRED, 'The name of the view');
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
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity = new View($input->getArgument('view'));
        $entity->save(new Filesystem());
    }
}
