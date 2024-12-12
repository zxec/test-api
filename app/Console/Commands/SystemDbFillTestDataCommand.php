<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SystemDbFillTestDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fill-test-data {--count=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполняет тестовыми данными бд';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $count = (int) $this->option('count');

        User::factory()->count($count)->create();

        return Command::SUCCESS;
    }
}
