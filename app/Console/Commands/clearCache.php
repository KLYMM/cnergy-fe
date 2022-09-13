<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\ResponseCache\Facades\ResponseCache;
use Cache, Data, Site;

class clearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitecache:clear {type} {--slug=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $type = $this->argument('type');
        $slug = $this->option('slug');

        switch($type)
        {
            case 'global': $this->_clearGlobal(); break;

            case 'readpage': $this->_clearReadpage($slug); $this->_clearGlobal(); break;
        }

        return 0;
    }

    private function _clearGlobal()
    {
        //global menu
        Data::menu(force: true);

        //global frontend setting
        Site::api('fe-setting', force:true);

        //global ads
        Site::api('inventory', force:true);

        //clear homepage fullpage
        ResponseCache::clear();
    }

    private function _clearReadpage($slug)
    {
        $this->info("_clearReadpage: ".$slug." \n");

        $slug = parse_url($slug)['path'] ?? null;

        if( $slug )
        {
            $id = explode('read/', $slug)[1] ?? null;
            $id = explode('/', $id)[0] ?? null;
            $id = intval($id);

            //renew data
            if( $id )
            {
                $this->info("_found: ".$id." \n");

                $row = Data::detailNews($id, true);

                $this->info("title: ".($row['news_title']??'-')." \n");
            }

            //clear full page
            ResponseCache::forget($slug);

            ResponseCache::selectCachedItems()->usingSuffix('desktop')->forUrls($slug)->forget();
            ResponseCache::selectCachedItems()->usingSuffix('mobile')->forUrls($slug)->forget();

            $this->info("_clearfullpage\n");
        }
    }
}
