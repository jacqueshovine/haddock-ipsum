<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetWord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:get {word?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns a word from its id';


    public function handle()
    {
        // (string) is a cast : If $word is null, returns empty string instead
        $word = (string) $this->argument('word');

        $result = Http::get('http://localhost/api/words/' . $word);

        $this->info($result);
    }
}
