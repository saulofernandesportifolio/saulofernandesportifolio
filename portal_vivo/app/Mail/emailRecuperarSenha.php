<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
Use Mail;

class emailRecuperarSenha extends Mail
{

  use Queueable,SerializesModels;

  protected $nova_senha;

  public function _construct($nova_senha){

      $this->nova_senha = $nova_senha;
  }

    public function build(){

        $senha_nova =['senha_nova',$this->nova_senha];
        return $this->view('email.emailrecuperarsenha',compact('senha_nova'));
       // return $this->view('email.emailrecuperarsenha')->with(['nova_senha',$this->nova_senha]));
    }

}
