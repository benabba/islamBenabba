<?php

namespace App\Http\Controllers;

use App\reserve;
use App\Mail\Mymail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF;

class resrvationController extends Controller
{


    public function store(Request $request)
    {


        $data = array(
            '1' => strtotime("10:00:00"),
            '2' => strtotime("12:30:00"),
            '3' => strtotime("13:30:00"),
            '4' => strtotime("16:00:00"),
            '5' => strtotime("14:00:00"),
            '6' => strtotime("16:30:00"),
            '7' => strtotime("19:00:00"),
            '8' => strtotime("17:00:00"),
            '9' => strtotime("19:30:00"),
            '10' => strtotime("14:00:00"),
            '11' => strtotime("19:30:00"),
        );

        $data2 = array(
            '1' => '10:00:00',
            '2' => '12:30:00',
            '3' => '13:30:00',
            '4' => '14:00:00',
            '5' => '16:00:00',
            '6' => '16:30:00',
            '7' => '17:00:00',
            '8' => '19:00:00',
            '9' => '19:30:00',
            '10' => '19:30:00',
            '11' => '20:00:00',
        );


        $date_depart = $request->get('date_d');
        $heure_depart = $request->get('heure_d');
        $date_fin = $request->get('date_f');
        $heure_fin = $request->get('heure_f');

        $date_debut = $request->get('debut');
        $date_fi = $request->get('fin');


        $laser = $request->get('laser');
        $type = $request->get('type');

        //ELequent
        $reserv = new reserve();

        $reserv->name = $request->get('nom');
        $reserv->email = $request->get('mail');
        $reserv->prenom = $request->get('pre');
        $reserv->Age = $request->get('phone');
        $reserv->telephone = $request->get('nombre');
        $reserv->nombre = $request->get('year');
        $reserv->date_deb = $request->get('debut');
        $reserv->date_fin = $request->get('fin');
        $reserv->verifie = 0;
        $reserv->Type_etage = 0;
        $reserv->date_d = $request->get('date_d');
        $reserv->date_f = $request->get('date_f');
        $reserv->heure_d = $request->get('heure_d');
        $reserv->heure_f = $request->get('heure_f');


        $de = strtotime($heure_depart);
        $tes1 = strtotime($data2['1']);
        $tes2 = strtotime($data2['2']);
        $tes3 = strtotime($data2['3']);

        $tes4 = strtotime($data2['4']);
        $tes5 = strtotime($data2['5']);
        $tes6 = strtotime($data2['6']);
        $tes7 = strtotime($data2['7']);
        $tes8 = strtotime($data2['8']);
        $tes9 = strtotime($data2['9']);
        $tes10 = strtotime($data2['10']);
        $tes11 = strtotime($data2['11']);

        //$reserv->save();


        if ($de >= $tes1 && $de <= $tes2) {

            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['1'], $data2['2']))//a refaire en cas
                ->count();


            $sum_per = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['1'], $data2['2']))//a refaire en cas
                ->sum('nombre');


            if ($nbr < 5 && $sum_per < 68) {
                $reserv->save();

                return Response::json(['success' => true]);


            }

        } elseif ($de > $tes2 && $de <= $tes3) {


            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['2'], $data2['3']))
                ->count();

            $sum_per = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['2'], $data2['3']))//a refaire en cas
                ->sum('nombre');


            if ($nbr < 3 && $sum_per <= 34) {
                $reserv->save();
            }

        } elseif ($de > $tes3 && $de <= $tes4) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['3'], $data2['4']))
                ->count();
//
//            $sum_per = reserve::where('date_d', $date_depart)
//                ->whereBetween('heure_d', array($data2['3'], $data2['4']))//a refaire en cas
//                ->sum('nombre');
//
            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes4 && $de <= $tes5) {

            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['4'], $data2['5']))
                ->count();

//            $sum_per = reserve::where('date_d', $date_depart)
//                ->whereBetween('heure_d', array($data2['4'], $data2['5']))//a refaire en cas
//                ->sum('nombre');


            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes5 && $de <= $tes6) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['5'], $data2['6']))
                ->count();

//            $sum_per = reserve::where('date_d', $date_depart)
//                ->whereBetween('heure_d', array($data2['5'], $data2['6']))//a refaire en cas
//                ->sum('nombre');

            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes6 && $de <= $tes7) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['6'], $data2['7']))
                ->count();

//            $sum_per = reserve::where('date_d', $date_depart)
//                ->whereBetween('heure_d', array($data2['6'], $data2['7']))//a refaire en cas
//                ->sum('nombre');


            if ($nbr < 5) {
                $reserv->save();
            }

        } elseif ($de > $tes7 && $de <= $tes8) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['7'], $data2['8']))
                ->count();

//            $sum_per = reserve::where('date_d', $date_depart)
//                ->whereBetween('heure_d', array($data2['7'], $data2['8']))//a refaire en cas
//                ->sum('nombre');


            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes8 && $de <= $tes9) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['8'], $data2['9']))
                ->count();

            $sum_per = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['8'], $data2['9']))//a refaire en cas
                ->sum('nombre');


            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes9 && $de <= $tes10) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['9'], $data2['10']))
                ->count();


            $sum_per = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['9'], $data2['10']))//a refaire en cas
                ->sum('nombre');


            if ($nbr < 5) {
                $reserv->save();
            }
        } elseif ($de > $tes10 && $de <= $tes11) {
            $nbr = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['10'], $data2['11']))
                ->count();


            $sum_per = reserve::where('date_d', $date_depart)
                ->whereBetween('heure_d', array($data2['10'], $data2['11']))//a refaire en cas
                ->sum('nombre');


            if ($nbr < 5 && $sum_per < 38) {
                $reserv->save();
            }
        } else {
            return Response::json(['error' => true]);
            //return redirect()->back()->with('alert', 'Deleted!');
        }

        //return Response::json(['success'=>true]);
        //return redirect('home');
    }


    public function sendEmailReminder(Request $request)
    {

        $name = $request->get('nom');
        $email = $request->get('mail');
        $prenom = $request->get('pre');
        $telephone = $request->get('phone');
        $nombre = $request->get('nombre');
        $age = $request->get('year');
        //$date_d = $request->get('debut');
        //$date_f = $request->get('fin');

        $data2 = array(
            'name' => $name,
            'mail' => $email,
            'pren' => $prenom,
            'tele' => $telephone,
            'nbr' => $nombre,
            'age' => $age
        );


        //$data = '%PDF-1.2 6 0 obj << /S /GoTo /D (chapter.1) >>';


        Mail::send('email.mymail', $data2, function ($message) use ($data2) {
            $message->to($data2['mail'])->subject('Testing Mail');
            $message->from('noreply@gmail.com');
            //$message->attach('/Users/mac/Downloads');

        });


//
//        Mail::send('email.mymail', $data, function ($message) use ($data) {
//            $message->to('ei_ben_abba@esi.dz')->subject('Testing Mail');
//            $message->from('noreply@gmail.com');
//        });
//        //Mail::to($request->email)->send(new Mymail($reser));

//        return redirect()->back();

        return redirect('home');
    }




    //$id = $reserv->id;
    //$this->downloadPDF($id);
    //return $this->downloadPDF($id);

//
//    public function downloadPDF($id)
//    {
//        //$pdf = \PDF::loadView('pdf',$things); // marche mais rien ne s'affiche sur l'ecran
//        //$pdf = \PDF::loadView('pdf',compact($name,$age));
//        $user = reserve::FindOrFall($id);
//
//
////        $data = array('name' => $request->get('inputName'),
////            'age' => '1/29/15');
//
//        $pdf = \PDF::loadView('pdf', compact('user'));
//
//        return $pdf->download('Fichier.pdf');
//
//
//    }
//
//    public function PDF(Request $request)
//    {
//        //$pdf = \PDF::loadView('pdf',$things); // marche mais rien ne s'affiche sur l'ecran
//        //$pdf = \PDF::loadView('pdf',compact($name,$age));
////        $user = reserve::FindOrFall($id);
//
//
////
////        $nom = $request->all();
////        dd($request->get('#inputEmail').val());
//        dd($request->input('emaill'));
//
//        //var_dump($nom);
//
////        $namee = $request->input('inputName');
//
//        $data = array('name' => 'ee',
//            'age' => '1/29/15');
//
//        $pdf = \PDF::loadView('pdf', compact('data'));
//
//        return $pdf->download('Fichier.pdf');
//
//
//    }


    public
    function afficherT(Request $request)
    {
        $reservations = reserve::all();
        return view('reserver', compact(['reservations']));
    }


    public
    function delete(Request $request, $id)
    {
        reserve::destroy($id);
        //return redirect()->back();
        return redirect()->back()->with('alert', 'Deleted!');

    }


    public function isDateBetweenDates($date, $startDate, $endDate)
    {
        if ($date > $startDate) {
            if ($date < $endDate) {
                return true;
            }

        }
    }

}




