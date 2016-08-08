<?php
namespace Thistle\App\Core\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Thistle\App\Core\Console\Generate\Entity\Entity;

class GenerateEntityCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate:entity')
            ->setDescription('Creates a new entity')
            ->addArgument('class_name', InputArgument::REQUIRED, 'The name of the Entity Class')
            ->addArgument('table_name', InputArgument::REQUIRED, 'The name of the database table to be created');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity = new Entity($input->getArgument('class_name'), $input->getArgument('table_name'));
        $entity->save(new Filesystem());
    }
}