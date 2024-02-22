<?php
namespace App\Http\Controllers;
   
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
   
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'Hi') {
                $this->askName($botman);
            }
            
            else{
                $botman->reply("Ecrivez Hi pour un Dialogue avec moi...");
            }
            if($message== 'Quels sont vos objectif') {
                $this->Objectif($botman);
            }
   
        });
   
        $botman->listen();
    }
   
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! bienvenu à cs technoligie, moi cest builderMan toujours apte à vous aider à construire vos projects 😉....que désirez-vous 
          ', function(Answer $answer) {
   
            $name = $answer->getText();
   
            $this->say('Nice to meet you '.$name);
        });
    }

   
}
