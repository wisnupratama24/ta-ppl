<?php

namespace App\Libraries;

class Email
{

  protected $email;
  public function __construct()
  {
    $this->email = \Config\Services::email();
  }

  public function send_email($to, $subject, $message)
  {
    $this->email->setFrom('pratamag983@gmail.com', 'Semarangku.');
    $this->email->setTo($to);
    $this->email->setSubject($subject);
    $this->email->setMessage($message);
    $result = $this->email->send();
    return $result;
  }

  public function message_aktivasi($nama, $link)
  {

    $lower_nama = strtolower($nama);
    $capitalize_nama = ucwords($lower_nama);

    $html = "

    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='Content-Type' content='text/html charset=UTF-8' />
    <title>Registrasi Pesera Event</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
          font-family: 'Poppins', sans-serif;
          background-color: white;
        }

        .main {
            color: black;
            margin:10vh auto;
            width: 600px;
            padding: 10vh;
            border: 1px solid rgba(218, 218, 218, 0.637);
        }

        .banner img {
          width: 100%;
          height: 180px;
        }

      
        .nama {
        text-transform: capitalize;
        padding-top: 20px;
        }

        .header-message {
        line-height: 1.275rem;
        font-size: 12px;
        text-align: justify;
        }

        .button-bayar {
        margin: 2rem auto;
        text-align: center;
        }

        .button-bayar a {
        font-size: 13px;
        text-align: center;
        margin: auto;
        padding: 10px 1rem;
        text-decoration: none;
        background-color: rgb(40, 116, 179);
        color: white;
        border-radius: 4px;
        }
        .warning {
          padding-top: 2rem;
          text-align: center;
          padding: 10px 1rem;
          font-size: 13px;
          color: white;
          background-color: #fb2992;
        }

        @media only screen and (min-width: 480px) and (max-width: 991px) {
        
          .main {
              margin:5vh auto;
              width: 400px;
              padding: 5vh;
              border: 1px solid rgba(218, 218, 218, 0.637);
          }

          .header-message {
            font-size: 12px;
          }

          .warning {
            padding-top: 1rem;
            padding: 8px 0.75rem;
            font-size: 10px;
          }

          .banner img {
            height: 150px;
          }

          .button-bayar a {
            font-size: 13px;
            padding: 10px 1rem;
            border-radius: 2px;
          }
        }


        @media only screen and (min-width: 300px) and (max-width: 479px) {
        
          .main {
              margin:3vh auto;
              width: 350px;
              padding: 3vh;
              border: 1px solid rgba(218, 218, 218, 0.637);
          }

          .header-message {
            font-size: 12px;
          }

          .warning {
            padding-top: 1rem;
            padding: 8px 0.75rem;
            font-size: 10px;
          }

          .banner img {
            height: 150px;
          }

          .button-bayar a {
            font-size: 13px;
            padding: 10px 1rem;
            border-radius: 2px;
          }
      }
    </style>

    </head>
      <body >
          <table border='0' cellpadding='0' cellspacing='0' width='100%'>
              <table class='main'>
                  <tr>
                      <td>
                      <p class='nama'>Hallo, <span>$capitalize_nama</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <p class='header-message'>
                              Pendaftaran kamu pada Semarangku. telah berhasil, silahkan aktifkan akun kamu dengan mengklik tombol di bawah ini : 
                          </p>
                      </td>
                  </tr>
                  <tr> 
                      <td class='button-bayar' style='padding:20px 0;'> 
                          <a href='$link'> Aktifkan Akun </a>
                      </td>

                  </tr>
                  <tr>
                      <td>
                          <p class='header-message'>Jika tombol tersebut tidak bekerja, anda bisa copy dan paste link ini di browser anda:</p>
                      </td>
                  </tr>
                  <tr>
                      <td style='padding-bottom: 20px; padding-top: -20px;'>
                      <a class='header-message' href='$link'>$link</a>
                      </td>
                  </tr>
                  <tr>
                      <td class='warning'>
                          Abaikan email ini jika kamu tidak melakukan pendaftaran di web Semarangku.
                      </td>
                  </tr>
                  <tr>
                      <td style='padding-top:20px;' class='salam header-message'>
                          Salam Hangat
                          <p style='margin-top: 0.5rem;'>
                          Semarangku.
                          </p>
                      </td>
                  </tr>
              </table>
          </table>
      </body>
    </html>
    
    ";

    return $html;
  }

  public function message_forgot_password($nama, $link)
  {

    $lower_nama = strtolower($nama);
    $capitalize_nama = ucwords($lower_nama);

    $html = "

    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='Content-Type' content='text/html charset=UTF-8' />
    <title>Registrasi Pesera Event</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
          font-family: 'Poppins', sans-serif;
          background-color: white;
        }

        .main {
            color: black;
            margin:10vh auto;
            width: 600px;
            padding: 10vh;
            border: 1px solid rgba(218, 218, 218, 0.637);
        }

        .banner img {
          width: 100%;
          height: 180px;
        }

      
        .nama {
        text-transform: capitalize;
        padding-top: 20px;
        }

        .header-message {
        line-height: 1.275rem;
        font-size: 12px;
        text-align: justify;
        }

        .button-bayar {
        margin: 2rem auto;
        text-align: center;
        }

        .button-bayar a {
        font-size: 13px;
        text-align: center;
        margin: auto;
        padding: 10px 1rem;
        text-decoration: none;
        background-color: rgb(40, 116, 179);
        color: white;
        border-radius: 4px;
        }
        .warning {
          padding-top: 2rem;
          text-align: center;
          padding: 10px 1rem;
          font-size: 13px;
          color: white;
          background-color: #fb2992;
        }

        @media only screen and (min-width: 480px) and (max-width: 991px) {
        
          .main {
              margin:5vh auto;
              width: 400px;
              padding: 5vh;
              border: 1px solid rgba(218, 218, 218, 0.637);
          }

          .header-message {
            font-size: 12px;
          }

          .warning {
            padding-top: 1rem;
            padding: 8px 0.75rem;
            font-size: 10px;
          }

          .banner img {
            height: 150px;
          }

          .button-bayar a {
            font-size: 13px;
            padding: 10px 1rem;
            border-radius: 2px;
          }
        }


        @media only screen and (min-width: 300px) and (max-width: 479px) {
        
          .main {
              margin:3vh auto;
              width: 350px;
              padding: 3vh;
              border: 1px solid rgba(218, 218, 218, 0.637);
          }

          .header-message {
            font-size: 12px;
          }

          .warning {
            padding-top: 1rem;
            padding: 8px 0.75rem;
            font-size: 10px;
          }

          .banner img {
            height: 150px;
          }

          .button-bayar a {
            font-size: 13px;
            padding: 10px 1rem;
            border-radius: 2px;
          }
      }
    </style>

    </head>
      <body >
          <table border='0' cellpadding='0' cellspacing='0' width='100%'>
              <table class='main'>
                  <tr>
                      <td>
                      <p class='nama'>Hallo, <span>$capitalize_nama</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <p class='header-message'>
                              Untuk mengatur ulang kata sandi kamu, silahkan klik tombol dibawah ini :  
                          </p>
                      </td>
                  </tr>
                  <tr> 
                      <td class='button-bayar' style='padding:20px 0;'> 
                          <a href='$link'>  Reset Kata Sandi </a>
                      </td>

                  </tr>
                  <tr>
                      <td>
                          <p class='header-message'>Jika tombol tersebut tidak bekerja, anda bisa copy dan paste link ini di browser anda:</p>
                      </td>
                  </tr>
                  <tr>
                      <td style='padding-bottom: 20px; padding-top: -20px;'>
                      <a class='header-message' href='$link'>$link</a>
                      </td>
                  </tr>
                  <tr>
                      <td class='warning'>
                          Abaikan email ini jika kamu tidak melakukan pendaftaran di web Semarangku.
                      </td>
                  </tr>
                  <tr>
                      <td style='padding-top:20px;' class='salam header-message'>
                          Salam Hangat
                          <p style='margin-top: 0.5rem;'>
                          Semarangku.
                          </p>
                      </td>
                  </tr>
              </table>
          </table>
      </body>
    </html>
    
    ";

    return $html;
  }
}
