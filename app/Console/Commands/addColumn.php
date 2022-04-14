<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class addColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'HMS:addColumn { newColumn : the new column name }
                                          { oldColumn : after this column new column add }
                                          { table : the table where you want to add column }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'addColumn in existing table';

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
        $newColumn = $this->argument('newColumn');
        $oldColumn = $this->argument('oldColumn');
        $table = $this->argument('table');

        DB::statement("ALTER TABLE $table ADD $newColumn INT(11) NULL AFTER $oldColumn");

        $this->info("$newColumn added to $table table after $oldColumn column");
    }
}
