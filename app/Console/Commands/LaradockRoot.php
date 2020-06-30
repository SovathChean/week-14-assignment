<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaradockRoot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laradock:root {order? : Command directly to laradock root. Value, "go"}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make life easier with laradock';

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
          case 'go':
            $this->info(exec('cd laradock && docker-compose exec workspace bash'));
            break;
          default:
            $this->info('please provide any document');
            break;
        }
    }
}
