<?php

namespace App\Console\Commands\User;

use Hash;
use App\User;
use Exception;
use Illuminate\Console\Command;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Création d'un utilisateur";

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
     * @return mixed
     */
    public function handle()
    {   
        $name = $this->ask('What is your name?');
        $password = $this->secret('What is the password?');
        $email = $this->ask('What is the email?');

        try {
            User::create([
                'name' => $name, 
                'password' => Hash::make($password), 
                'email' => $email
            ]);
            $this->info("Création de l'utilisateur " . $name);
        } catch (Exception $e) {
            $this->error("Error lors de la creation de l'utilisateur");
            $this->error($e->getMessage());
        }
    }
}
