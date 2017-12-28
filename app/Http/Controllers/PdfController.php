<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;
use App\reserve;
use App\Mail\Mymail;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{


    public function PDFD(Request $request)
    {
        //$pdf = \PDF::loadView('pdf',$things); // marche mais rien ne s'affiche sur l'ecran
        //$pdf = \PDF::loadView('pdf',compact($name,$age));
//        $user = reserve::FindOrFall($id);


//
//        $nom = $request->all();
        $name = $request->input('Name');
        $email = $request->input('emaill');
        $prenom = $request->input('Prenom');
        $age = $request->input('age');
        $telephone = $request->input('telephone');
        $nombre = $request->input('Nombre');
        $type = $request->input('typepayement');
//        $request->input('lasergame');
        //var_dump($nom);

//        $namee = $request->input('inputName');

        $data = array('name' => $name,
            'prenom' => $prenom,
            'age' => $age,
            'email' => $email,
            'telephone' => $telephone,
            'nombre' => $nombre,
            'TypeP' => $type);

        $pdf = \PDF::loadView('pdf', compact('data'));

        return $pdf->download('Fichier.pdf');


    }

}
