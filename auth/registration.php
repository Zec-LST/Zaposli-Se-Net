<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>registration</title>
    <link rel='stylesheet' href='auth.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a class="back-btn" href="/">< Nazad</a>
      <h1>Registracija</h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <form class="registration-form">
        <div class="registration-container">
          <div class="registration-left-container">
            <p>
              <label for="name">Ime i prezime: </label> <br>
              <input class="registration-input" type="text" name="name" id="user_name" >
            </p>
            <p>
              <label for="email">E-mail: </label> <br>
              <input class="registration-input" type="text" name="email" id="user_email" >
            </p>
            <p>
              <label for="password">Lozinka: </label> <br>
              <input class="registration-input" type="text" name="password" id="user_password" >
            </p>
            <p>
              <label for="number">Kontakt broj: </label> <br>
              <input class="registration-input" type="text" name="number" id="user_number" >
            </p>
          </div>
          <div class="registration-right-container">
            <p>
              <label for="company-name">Ime tvrtke: </label> <br>
              <input class="registration-input" type="text" name="company-name" id="user_companyName" >
            </p>
            <p>
              <label for="company-location">Sjedište tvrtke: </label> <br>
              <input class="registration-input" type="text" name="company-location" id="user_companyLocation" >
            </p>
            <button type='button' aria-label='Pritisnuti za registaciju'
              class='button-register'>REGISTRIRAJ SE
            </button>
            <p class="registration-text"><br>Već imaš kreiran račun?
              <b>Prijavi se</b></p>
          </div>
        </div>
      </form>
    </div>

    <footer>
      <div class='footer-info'>
        <a class="footer-logo" href="/">Zaposlise.net</a>
        <div class='footer-info-links'>
           <a aria-label="Pritisnuti za više informacija o nama" href="/">O nama</a>
           <a aria-label="Pritisnuti za kontaktiranje" href="/">Kontakt</a></li>
           <a aria-label="Pritisnuti za pomoć" href="#">Pomoć</a>
         </ul>
        </div>
     </div>

     <div class="footer-social-privacy">
       <div class="footer-social">
         <a href='/'>
           <img src='../images/icon-instagram.svg' aria-label="Pritisnuti za
           otvaranje Instagram profila"
           alt='Instagram logo' loading = 'lazy'>
         </a>
         <a href='/'>
           <img src='../images/icon-twitter.svg' alt='Twitter logo'
           aria-label="Pritisnuti za otvaranje Twitter profila"
           loading = 'lazy'>
         </a>
         <a href='/'>
           <img src='../images/icon-facebook.svg' alt='Facebook logo'
           aria-label="Pritisnuti za otvaranje Facebook profila"
           loading = 'lazy'>
         </a>
       </div>

       <div class="footer-privacy">
         <a aria-label="Pritisnuti za otvaranje police privatnosti" href='/'>Polica privatnosti</a>
         <a aria-label="Pritisnuti za otvaranje uvjeta korištenja" href='/'>Uvjeti korištenja</a></li>
         <a href='/'>@ 2021 zaposlise.net</a>
       </div>
     </div>
    </footer>

    <script type="text/javascript">

    </script>
  </body>
</html>
