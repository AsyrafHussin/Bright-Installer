<?php

namespace Bright\Installer\Console;

use ZipArchive;
use RuntimeException;
use GuzzleHttp\Client;
use Symfony\Component\Process\Process;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class NewCommand extends Command
{
    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('new')
            ->setDescription('Create a new Bright application.')
            ->addArgument('name', InputArgument::OPTIONAL);
    }

    /**
     * Execute the command.
     *
     * @param  \Symfony\Component\Console\Input\InputInterface  $input
     * @param  \Symfony\Component\Console\Output\OutputInterface  $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // check php zip extension
         if (! class_exists('ZipArchive')) {
             throw new RuntimeException('The Zip PHP extension is not installed. Please install it and try again.');
         }
         
         // get directory name
         $directory = ($input->getArgument('name')) ? getcwd().'/'.$input->getArgument('name') : getcwd();

         $output->writeln('<info>Creating Bright project...</info>');
    }
}