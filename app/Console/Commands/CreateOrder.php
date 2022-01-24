<?php

namespace App\Console\Commands;

use App\Events\SendMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;

class CreateOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new order to school.';

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
     * @return void
     */
    public function handle()
    {
        Artisan::call('db:seed --class=OrderSeeder');
        $this->info('order has been created successfully');
        event(new SendMail());
    }
}
