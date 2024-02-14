<?php
//namespace App\Console\Commands;
//
//use Illuminate\Console\Command;
//use Illuminate\Support\Facades\Artisan;
//use Database\Seeders\AssignRolesToUserSeeder;
//
//class CustomSeedCommand extends Command
//{
//    protected $signature = 'custom:seed {emailName} {roleName} {--class= : The seeder class}';
//
//    public function handle()
//    {
//        $userEmail = $this->argument('emailName');
//        $roleName = $this->argument('roleName');
//
//        $seederClass = $this->option('class');
//
//        // If the class option is not provided, use the default seeder
//        $seederClass = $seederClass ?: AssignRolesToUserSeeder::class;
//
//        // Run the seeder directly without using Artisan call
//        $seeder = app()->make($seederClass);
//        $seeder->run($userEmail, $roleName);
//
//        $this->info('Seeder executed successfully.');
//    }
//}
