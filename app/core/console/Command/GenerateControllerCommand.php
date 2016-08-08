<?php
namespace Thistle\App\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\Controller\Controller;
use Thistle\App\Core\Console\Generate\View\View;

class GenerateControllerCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate:controller')
            ->setDescription('Creates a new controller')
            ->addArgument('controller', InputArgument::REQUIRED, 'The name of the Controller Class')
            ->addArgument('method', InputArgument::REQUIRED, 'The name of the first method to be created')
            ->addOption('no-view', '-nv', InputOption::VALUE_NONE, 'Do not automatically generate a view for the main method');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $controller = new Controller($input->getArgument('controller'), $input->getArgument('method'));
        $controller->save(new Filesystem());

        if (!$input->getOption('no-view')) {
            $view = new View($input->getArgument('method'));
            $view->save(new Filesystem());
        }
    }
}