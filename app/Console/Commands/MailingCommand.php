<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\NewArticles;
use Illuminate\Console\Command;

class MailingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mailing {period} {users?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Рассылка подборки статей';

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
        $users = $this->argument('users')
            ? User::findOrFail($this->argument('users'))
            : User::all();
        $users->map->notify(new NewArticles($this->argument('period')));
        return Command::SUCCESS;
    }
}
