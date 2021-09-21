<?php

  require_once("../database/ads.php");
  require_once("../database/users.php");

  $id = $_GET['id'];
  $adDB = $ads_table->retreiveAdById($id);
  $ad = $adDB->fetch();
  $employerDB = $users_table->retrieveUserById($ad['employer_id']);
  $employer = $employerDB->fetch();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>ad</title>
    <link rel='stylesheet' href='ad.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a class="back-btn" href="/">< Nazad</a>
      <h1><?= htmlspecialchars($ad['ad_title'])?></h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <div class="employer-details-container">
        <h2 class="employer-details-title">Poslodavac</h2>
        <img class="employer-photo" src=<?= htmlspecialchars($employer['user_image'])?> alt="Slika poslodavca">
        <div class="employer-details">
          <h3 class="employer-details-text"><?= htmlspecialchars($employer['user_company_name'])?></h3>
          <h3 class="employer-details-text"><?= htmlspecialchars($employer['user_email'])?></h3>
          <h3 class="employer-details-text"><?= htmlspecialchars($employer['user_contact_number'])?></h3>
        </div>
      </div>
      <div class="ad-details-container">
        <div class="first-container">
          <div class="address-container">
            <img class="address-logo" src="/images/icon-location.svg" alt="Logo adrese">
            <span class="address-text-city"> <?= htmlspecialchars($ad['ad_city'])." ".htmlspecialchars($ad['ad_county'])?> <br> </span>
          </div>
          <span class="address-text-street"><?= htmlspecialchars($ad['ad_street'])?> <br> </span>
          <div class="ad-category">
            <span class="ad-category-text"><?= htmlspecialchars($ad['ad_category'])?> </span>
          </div>
        </div>
        <div class="second-container">
          <span class="application-deadline-text">PRIJAVE DO: <?= htmlspecialchars($ad['ad_expire_time'])?> <br></span>
          <button type='button' aria-label='Pritisnuti za prijavu'
            class="primary-button">PRIJAVI SE
          </button>
        </div>
        <div class="ad-description-container">
          <h2 class="ad-description-title">Opis posla</h2>
          <p class="ad-description-text"><?= htmlspecialchars($ad['ad_description'])?></p>
          <p class="fee-text"> Naknada: <?= htmlspecialchars($ad['ad_wage'])?> kn/h</p>
        </div>
      </div>
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
