<?php

namespace App\Commands;

use App\Services\SearchService\ElasticSearchService;
use App\Services\SearchService\PostElasticSearchService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Modules\Admin\Entities\Post;

class MigrateDataToElasticSearch extends Command implements SelfHandling
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:data-elasticsearch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate and index data to elastisearch';

    protected $model;

    protected $postElasticSearchService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Post $model,PostElasticSearchService $postElasticSearchService)
    {
        $this->model = $model;
        $this->postElasticSearchService = $postElasticSearchService;
        parent::__construct();
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->getData();

        $bar = $this->output->createProgressBar(count($data));

        foreach ($data as $item){
            try{
                $this->postElasticSearchService->create($item->id,$item);
                $bar->advance();
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }

        }

        $bar->finish();
    }


    private function getData()
    {
        return $this->model->where('active', 1)->with('categorie')->with('tags')->with('user')->get();
    }
}
