<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
  use Queueable, SerializesModels;

  protected $code;

  /**
   * Create a new message instance.
   *
   * @param string $code
   */
  public function __construct($code)
  {
    $this->code = $code;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.reset-password')
      ->with(['code' => $this->code])
      ->subject('Reset your password');
  }
}
