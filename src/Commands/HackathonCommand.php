<?php

namespace Avocadomedia\Hackathon\Commands;

use Illuminate\Console\Command;

class HackathonCommand extends Command
{
    public $signature = 'hackathon';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
