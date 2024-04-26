<?php

namespace App\Providers;

use App\Models\formateur;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       // Récupérer l'email inséré dans l'input
      /* $email = request()->input('email');
        
       // Rechercher l'utilisateur correspondant à l'email dans la base de données
       $user = formateur::where('f_email', $email)->first();
       
       // Vérifier si l'utilisateur existe
       if ($user) {
           // Partager l'ID de l'utilisateur avec toutes les vues
           View::share('id_user', $user->id_formateur);
       }*/
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
