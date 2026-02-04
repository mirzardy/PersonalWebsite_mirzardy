<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class CleanUnusedPostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-unused-post-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete images in storage/app/public/posts that are not used by any post';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Storage::disk('public')->files('posts');
        $used = Post::pluck('image')->filter()->values()->toArray();

        foreach ($files as $file) {
            if (!in_array($file, $used)) {
                Storage::disk('public')->delete($file);
            }
        }

        $this->info('Unused images deleted');
    }
}
