<?php

namespace App\Mail;

use App\Models\CodigoVerificacao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CodigoVerificacaoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $codigo;

    public function __construct(CodigoVerificacao $codigo)
    {
        $this->codigo = $codigo->code; 
    }

    public function build()
    {
        return $this->subject('Código de Verificação')
                    ->view('emails.codigo-verificacao')
                    ->with(['codigo' => $this->codigo]);
    }
}

