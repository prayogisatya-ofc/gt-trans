<?php

namespace App\Console\Commands;

use App\Models\RouteCategory;
use App\Models\TravelRoute;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gt:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml for GT Trans';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $sitemap->add(
            Url::create(route('home'))
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $sitemap->add(
            Url::create(route('routes.index'))
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        $sitemap->add(
            Url::create(route('services'))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create(route('faq'))
                ->setPriority(0.7)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        $sitemap->add(
            Url::create(route('contact'))
                ->setPriority(0.7)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        );

        RouteCategory::query()
            ->orderBy('name')
            ->chunk(200, function ($cats) use ($sitemap) {
                foreach ($cats as $cat) {
                    $sitemap->add(
                        Url::create(route('routes.index', ['category' => $cat->slug]))
                            ->setPriority(0.6)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    );
                }
            });

        TravelRoute::query()
            ->where('is_active', true)
            ->select(['slug', 'updated_at'])
            ->chunk(500, function ($routes) use ($sitemap) {
                foreach ($routes as $r) {
                    $sitemap->add(
                        Url::create(route('routes.show', $r->slug))
                            ->setLastModificationDate($r->updated_at ?? Carbon::now())
                            ->setPriority(0.8)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    );
                }
            });

        $targetDir = rtrim(env('GT_SITEMAP_PUBLIC_DIR', public_path()), '/');
        $targetPath = $targetDir . '/sitemap.xml';

        $sitemap->writeToFile($targetPath);

        $this->info('✅ Sitemap generated: public/sitemap.xml');
        return self::SUCCESS;
    }
}
