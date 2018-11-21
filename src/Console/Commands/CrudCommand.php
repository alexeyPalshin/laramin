<?php


namespace Laramin\Console\Commands;

use Illuminate\Console\Command;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate crud for given Model';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $model = $this->argument('model');

        DB::insert('insert into crud_models (model_name) values (?)', [$model]);

        $this->output->write('ok', true);
    }
}