<?php

namespace App\Console\Commands;

use App\Mail\CronMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {--email= : The email address to send to}
                                        {--m|messageText= : Message for user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to a user to check that delivery is workin';

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
        $email = $this->option('email') ?? null;
        $messageText = $this->option('messageText') ?? 'default';

            Mail::to($email)
                ->send(new CronMail($messageText));
            $this->info('Email sent to' .$email.'');


        return Command::SUCCESS;
    }
}
