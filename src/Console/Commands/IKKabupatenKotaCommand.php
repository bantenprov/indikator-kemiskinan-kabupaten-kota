<?php

namespace Bantenprov\IKKabupatenKota\Console\Commands;

use Illuminate\Console\Command;

/**
 * The IKKabupatenKotaCommand class.
 *
 * @package Bantenprov\IKKabupatenKota
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class IKKabupatenKotaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:ik-kabupaten-kota';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\IKKabupatenKota package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\IKKabupatenKota package');
    }
}
