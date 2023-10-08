<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:data';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the database and seed it with fresh data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Resetting the users_leave_datas table...');
        DB::table('users_leave_datas')->truncate();

        $this->info('Seeding the users_leave_datas table...');
        $this->call('db:seed', ['--class' => 'Users_data_Seeder']);

        $this->info('Reset and seed complete.');
    }
}
