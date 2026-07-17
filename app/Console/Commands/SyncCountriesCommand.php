<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CountryService;

class SyncCountriesCommand extends Command
{
    /**
     * Nama command
     */
    protected $signature = 'countries:sync';

    /**
     * Deskripsi
     */
    protected $description = 'Sync countries from REST Countries API';

    /**
     * Execute the console command.
     */
    public function handle(CountryService $countryService)
    {
        $this->info('Syncing countries...');

        try {

            $total = $countryService->syncCountries();

            $this->info("Success! {$total} countries synchronized.");

        } catch (\Exception $e) {

            $this->error($e->getMessage());

        }

        return self::SUCCESS;
    }
}