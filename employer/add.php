<?php

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>add ad</title>
    <link rel='stylesheet' href='add.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a class="back-btn" href="/">< Nazad</a>
      <h1>Novi oglas</h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <form class="add-ad-form" method="POST" action="">
        <div class="inputs">
          <label for="url">Naslov:</label>
          <input type="text" name="title" id="title">

          <label for="url">URL slike:</label>
          <span class="error"><?php if (isset($urlError)) echo $urlError ?></span>
          <input type="text" name="url" id="url">

          <div class="filter">
            <label for="category">Kategorija posla</label>
            <select name="category" id="county">
              <option value="volvo">Studentski posao</option>
            </select>
          </div>

          <label for="salary">Satnica</label>
          <input type="text" name="salary" id="salary">

          <label for="date">Prijave do</label>
          <input type="date" name="date" id="date" value="2021-09-23">

          <label for="description">Opis posla</label>
          <textarea rows="5" cols = "60" type="text" name="description" id="description"></textarea>

          <p class="location-title">Informacije o lokaciji</p>
          <label for="url">Ulica:</label>
          <input type="text" name="street" id="street">

          <label for="url">Mjesto:</label>
          <input type="text" name="place" id="place">

          <div class="filter">
            <label for="county">Županija</label>
            <select name="county" id="county">
              <option value="volvo">Osječko-baranjska</option>
              <option value="saab">Zagrebačka</option>
              <option value="mercedes">Požeško-slavonska</option>
              <option value="audi">Dubrovačka</option>
            </select>
          </div>
        </div>
        <input class="submit-button" type="submit" value="Objavi" id="submit">
      </form>


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
         <a href='https://www.instagram.com/'>
           <img src='../images/icon-instagram.svg' aria-label="Pritisnuti za
           otvaranje Instagram profila"
           alt='Instagram logo' loading = 'lazy'>
         </a>
         <a href='https://twitter.com/'>
           <img src='../images/icon-twitter.svg' alt='Twitter logo'
           aria-label="Pritisnuti za otvaranje Twitter profila"
           loading = 'lazy'>
         </a>
         <a href='https://www.facebook.com/'>
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
