<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Console\Command;
use function GuzzleHttp\json_decode;

class ImportHerokuBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import-heroku-blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        try {
            $adminUser = User::where('email', 'admin@blog.com')->first();
            if ($adminUser) {
                $client = new Client();
                $response = $client->get('https://sq1-api-test.herokuapp.com/posts');

                $code = $response->getStatusCode();

                if ($code == 200) {
                    $responseData = $response->getBody()->getContents();
                    $blogs = json_decode($responseData);

                    foreach ($blogs->data as $blog) {
                        $existBlog = Blog::where('title', $blog->title)
                            ->where('publication_date', $blog->publication_date)
                            ->where('user_id', $adminUser->id)
                            ->first();

                        if (!$existBlog) {
                            $newBlog = new Blog();
                            $newBlog->fill([
                                'title' => $blog->title,
                                'description' => $blog->description,
                                'publication_date' => $blog->publication_date,
                                'user_id' => $adminUser->id
                            ]);
                            $newBlog->save();
                        }
                    }

                }

            }
        } catch (ClientException $e) {
            // Can Handle Error if API not working
        }

        return 0;
    }
}
