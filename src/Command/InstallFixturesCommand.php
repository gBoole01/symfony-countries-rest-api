<?php

namespace App\Command;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
name: 'app:install-fixtures',
description: 'Add countries in the database',
)]
class InstallFixturesCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $countriesJson = json_decode(file_get_contents("public/countries.json"), true)["countries"];

        foreach ($countriesJson as $entry) {
            $country = new Country(
                code: $entry["code"],
                name: $entry["name"],
                native: $entry["native"],
                phone: $entry["phone"],
                continent: $entry["continent"],
                capital: $entry["capital"],
                currency: $entry["currency"],
                emoji: $entry["emoji"],
            );

            $this->entityManager->persist($country);
            $this->entityManager->flush();
        }

        $io->success(sprintf('Succesfully added %s countries into database', count($countriesJson)));

        return Command::SUCCESS;
    }
}