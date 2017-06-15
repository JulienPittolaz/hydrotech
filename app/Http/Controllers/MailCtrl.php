<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailCtrl extends Controller
{
    /**
     * Gère l'envoi.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendemail(Request $request)

    {
        $topic = $request->topic;
        $title = $request->sujet;
        $user_email = $request->email;
        $user_name = $request->nom;
        $user_firstname = $request->prenom;
        $user_company = $request->entreprise;
        $body = $request->message;
        $data = ['topic' => $topic, 'email'=> $user_email,'name'=> $user_name,'first_name' => $user_firstname, 'entreprise' => $user_company, 'subject' => $title, 'email_corps' => $body];
        Mail::send('emails.send', $data, function($message) use ($data)
        {
            $subject="Hydrocontest ".$data['topic']." : ".$data['subject'];
            $message->from($data['email']);
            $message->to("timothee.delapierre@gmail.com")->subject($subject);

        });
    }
}
