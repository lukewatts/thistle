<?php
namespace Thistle\App\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\View\View;

class GenerateViewCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate:view')
            ->setDescription('Creates a new view')
            ->addArgument('view', InputArgument::REQUIRED, 'The name of the view');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity = new View($input->getArgument('view'));
        $entity->save(new Filesystem());
    }
}