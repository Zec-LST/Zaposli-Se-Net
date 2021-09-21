<?php
    require_once("../database/counties.php");
    require_once("../database/categories.php");
    require_once("../database/ads.php");

    if(!isset($_COOKIE['employer'])){
        header("Location: ../auth/login.php");
    }

    $id = $_GET['id'];
    $adDB = $ads_table->retreiveAdById($id);
    $ad = $adDB->fetch();

    $counties = $counties_table->retrieveCounties();
    $categories = $categories_table->retrieveCategories();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      if(isset($_POST['delete'])){
        $ads_table->deleteAd($id);
        $_SESSION["ad-list-updated"] = "true";
        header("location: ./dashboard.php");
      } else {

        $url = $street = $city = $county = $category = $title = $description = $expire_time = $wage = $date = '';

        $county = $_POST['county'];
        $category = $_POST['category'];
        $date = $_POST['date'];
        $employer_id = $_COOKIE['employer'];

        // check url
        $urlInput = $_POST['url'];
        if(empty($urlInput)){
          $urlError = "Polje ne može ostati prazno!";
        } else {
          if(filter_var($urlInput, FILTER_VALIDATE_URL)){
            $url = trim(htmlspecialchars($urlInput));
          } else {
            $urlError = "Molimo unesite ispravan URL!";
          }
        }

        // check title
        $titleInput = $_POST['title'];
        if(empty($titleInput)) {
          $titleError = "Polje ne može ostati prazno!";
        } else {
          $title = $titleInput;
        }

        // check city
        $cityInput = $_POST['city'];
        if(empty($cityInput)) {
          $cityError = "Polje ne može ostati prazno!";
        } else {
          $city = $cityInput;
        }

        // check street
        $streetInput = $_POST['street'];
        if(empty($streetInput)) {
          $streetError = "Polje ne može ostati prazno!";
        } else {
          $street = $streetInput;
        }

        // check salary
        $salaryInput = (float)$_POST['salary'];
        if(empty($salaryInput)){
          $salaryError = "Polje ne može ostati prazno!";
        } else {
          if(filter_var($salaryInput, FILTER_VALIDATE_FLOAT)){
            $wage = trim(htmlspecialchars($salaryInput));
          } else {
            $salaryError = "Molimo unesite ispravnu satnicu!";
          }
        }

        // check description
        $descriptionInput = $_POST['description'];
        if(empty($descriptionInput)) {
          $descriptionError = "Polje ne može ostati prazno!";
        } else {
          $description = $descriptionInput;
        }

        if($url != '' &&
          $title != '' &&
          $wage != '' &&
          $city != '' &&
          $county != '' &&
          $category != '' &&
          $description != '' &&
          $street != '' &&
          $date != '' &&
          $employer_id != ''
        ) {
          $ads_table->update($url, $street, $city, $county, $category, $title, $description, $date, $wage, $employer_id, $id);

          $_SESSION["ad-list-updated"] = "true";
          header("location: ./dashboard.php");
        }
      }
    }
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
      <a class="back-btn" href="./dashboard.php">< Nazad</a>
      <h1>Uredi oglas</h1>
      <div class="logo">
        <a href="/">Zaposlise.net</a>
      </div>
    </header>

    <div class="page-content">
      <form class="add-ad-form" method="POST" action="">
        <div class="inputs">
          <label for="url">Naslov:</label>
          <span class="error"><?php if (isset($titleError)) echo $titleError ?></span>
          <input type="text" name="title" id="title" value=<?= htmlspecialchars($ad['ad_title'])?>>

          <label for="url">URL slike:</label>
          <span class="error"><?php if (isset($urlError)) echo $urlError ?></span>
          <input type="text" name="url" id="url" value=<?= htmlspecialchars($ad['ad_image']) ?>>

          <div class="filter">
            <label for="category">Kategorija posla</label>
            <select name="category" id="category">
              <?php while ($row = $categories->fetch()) :?>
              <?php if($row['category_name']==$ad['ad_category']): ?>
                <option value="<?= $row['category_name'] ?>" selected><?= $row['category_name'] ?></option>
              <?php else: ?>
                <option value="<?= $row['category_name'] ?>"><?= $row['category_name'] ?></option>
              <?php endif ?>
              <?php endwhile; ?>
            </select>
          </div>

          <label for="salary">Satnica</label>
          <span class="error"><?php if (isset($salaryError)) echo $salaryError ?></span>
          <input type="text" name="salary" id="salary" value=<?= htmlspecialchars($ad['ad_wage'])?>>

          <label for="date">Prijave do</label>
          <input type="date" name="date" id="date" value=<?= htmlspecialchars($ad['ad_expire_time'])?>>

          <label for="description">Opis posla</label>
          <span class="error"><?php if (isset($descriptionError)) echo $descriptionError ?></span>
          <textarea rows="5" cols = "60" type="text" name="description" id="description"><?= htmlspecialchars($ad['ad_description'])?></textarea>

          <p class="location-title">Informacije o lokaciji</p>
          <label for="url">Ulica:</label>
          <span class="error"><?php if (isset($streetError)) echo $streetError ?></span>
          <input type="text" name="street" id="street" value=<?= htmlspecialchars($ad['ad_street'])?>>

          <label for="url">Mjesto:</label>
          <span class="error"><?php if (isset($cityError)) echo $cityError ?></span>
          <input type="text" name="city" id="city" value=<?= htmlspecialchars($ad['ad_city'])?>>

          <div class="filter">
            <label for="county">Županija</label>
            <select name="county" id="county">
              <?php while ($row = $counties->fetch()) :?>
                <?php if($row['county_name']==$ad['ad_county']): ?>
                    <option value="<?= $row['county_name'] ?>" selected><?= $row['county_name'] ?></option>
                <?php else: ?>
                  <option value="<?= $row['county_name'] ?>"><?= $row['county_name'] ?></option>
                <?php endif; ?>
              <?php endwhile; ?>
            </select>
          </div>

        </div>
        <input class="submit-button" type="submit" value="Spremi promjene" id="submit">
        <form class="delete-form" method="POST" action="">
          <input type="submit" name="delete" class="delete-btn" value="Ukloni ovaj oglas">
        </form>
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
