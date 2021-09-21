<?php
    if(!isset($_COOKIE['employer'])){
        header("Location: ../auth/login.php");
    }
    if (file_exists("../database/ads.php")) {
        require_once("../database/ads.php");
    }
    $id = $_COOKIE['employer'];
    $ads = $ads_table->retreiveAdsByEmployerId($id);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>dashboard</title>
    <link rel='stylesheet' href='employer.css'/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a class="back-btn" href="/">< Nazad</a>
      <h1>Moji oglasi</h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <button class="add-button" type="button" name="button"
        onclick="window.location.href='./add.php'">Dodaj oglas</button>
      <table class="table ads-table">
        <thead>
          <tr>
            <th scope="col">Naziv</th>
            <th scope="col">Mjesto</th>
            <th scope="col">Kategorija</th>
            <th scope="col">Prijave do</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = $ads->fetch()): ?>
            <tr>
              <td label='Naziv:'><?php echo $row["ad_title"]; ?></td>
              <td label='Mjesto:'><?php echo $row["ad_city"]; ?></td>
              <td label='Kategorija:'><?php echo $row["ad_category"]; ?></td>
              <td label='Prijave do:'><?php echo $row["ad_expire_time"]; ?></td>
              <td>
                <button id="<?php echo $row["ad_id"]; ?>" class="add-ad-button"
                  data-rel="back" type="button" name="button"
                  onclick="openUpdatePage(this.id)">UREDI</button>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <button class="logout-button"type="button" name="button"
        onclick="window.location.href='../auth/logout.php'">Odjavi se</button>
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
      function openUpdatePage(id) {
        window.location.href='./update.php?id='+id;
      }
    </script>
  </body>
</html>
