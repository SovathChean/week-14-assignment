<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:server {order? : Command string to execute laradock. Value: "", "start", "stop"}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Managing local server in laradock';

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
     * @return int
     */
    public function handle()
    {
        //
        $command = $this->argument('order');
        switch($command)
        {
          case 'start':
            $this->info(exec('cd laradock && docker-compose up -d nginx mysql phpmyadmin mailhog'));
            break;
          case 'stop':
            $this->info(exec('cd laradock && docker-compose kill'));
            break;
          default:
            $this->info("app:server command");
            break;
        }
    }
}
