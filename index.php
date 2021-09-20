<?php
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>www.zaposlise.net</title>
    <link rel='stylesheet' href='styles.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>

    <header>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
      <div class="nav">
        <a class="nav-item" href="#ads">Oglasi</a>
        <a class="nav-item" href="/">Radnik</a>
        <div class="dropdown">
          <button class="dropbtn">Poslodavac</button>
          <div class="dropdown-content">
            <a href="/">Prijava</a>
            <a href="/">Registracija</a>
            <a href="/">Forum</a>
          </div>
        </div>
      </div>
      <span href="/" class='menu-button' style="cursor:pointer">&#9776;</span>
    </header>

    <main class="page-content">
      <div class="landing">
        <div class="landing-text">
          <p class="landing-title">Više od 1000 oglasa na jednom mjestu</p>
          <p class="landing-subtitle">Gradimo bolju budućnost zajedno i za svakog!</p>
          <a class="primary-button" href="#ads">Pregledaj oglase</a>
        </div>
        <img class="landing-image" src="images/header-image.png" alt="">
      </div>

      <div class="main-section">
        <div class="side-section">

          <div class="subscription-section">
            <p class="subscription-title">Želiš li među prvima saznati za nove oglase?</p>
            <p class="subscription-subtitle">Upiši svoju email adresu i pretplati se za naš Newsletter</p>
            <div class="email-input-container">
              <img class="email-icon" src="images/mail-icon.svg" alt="">
              <input class="email-input" type="email" name="email" placeholder="Email address">
            </div>
            <a class="subscription-button" href="/">Pretplati me</a>
          </div>

          <div class="advertising-space">
            <p>Mjesto za reklamu</p>
          </div>

        </div>
        <div id="ads" class="ads">

          <div class="ads-section-header">
            <h2>Oglasi</h2>
            <div class="filters">
              <div class="filter">
                <label for="county">Županija</label>
                <select name="county" id="county">
                  <option value="volvo">Sve</option>
                  <option value="volvo">Osječko-baranjska</option>
                  <option value="saab">Zagrebačka</option>
                  <option value="mercedes">Požeško-slavonska</option>
                  <option value="audi">Dubrovačka</option>
                </select>
              </div>
              <div class="filter">
                <label for="category">Kategorija posla</label>
                <select name="category" id="county">
                  <option value="volvo">Sve</option>
                  <option value="volvo">Studentski posao</option>
                </select>
              </div>
            </div>
          </div>

          <div class="jobs-list">
            <div class="job-item">
              <img class="ad-item-img" src="" alt="">
              <div class="place-and-category">
                  <p class="job-place">Osijek</p>
                  <div class="job-category">Studentski posao</div>
              </div>
              <p class="job-title">Prodajni predstavnik</p>
              <p class="job-date">Prijave do 30.rujna 2021.</p>
            </div>
        </div>
          <a class="show-all-button" href="/">Pogledaj sve ></a>
      </div>
    </main>

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
           <img src='images/icon-instagram.svg' aria-label="Pritisnuti za
           otvaranje Instagram profila"
           alt='Instagram logo' loading = 'lazy'>
         </a>
         <a href='https://twitter.com/'>
           <img src='images/icon-twitter.svg' alt='Twitter logo'
           aria-label="Pritisnuti za otvaranje Twitter profila"
           loading = 'lazy'>
         </a>
         <a href='https://www.facebook.com/'>
           <img src='images/icon-facebook.svg' alt='Facebook logo'
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
