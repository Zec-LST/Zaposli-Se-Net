<?php
  require_once("./database/ads.php");

  if(isset($_POST['county'])&&isset($_POST['category'])) {
    $county = $_POST['county'];
    $category = $_POST['category'];

    if($county == "all-counties") {
        $ads_by_county = $ads_table->retrieveAds();
    } else {
        $ads_by_county = $ads_table->retreiveAdsByCounty($county);
    }

    if($category == "all-categories") {
      $ads_by_category = $ads_table->retrieveAds();
    } else {
      $ads_by_category = $ads_table->retreiveAdsByCategory($category);
    }

    $rowsCounty = [];
    while($row = $ads_by_county->fetch())  {
        $rowsCounty[] = $row;
    }

    $rowsCategory = [];
    while($row = $ads_by_category->fetch())  {
        $rowsCategory[] = $row;
    }

    $ads = array();
    foreach ($rowsCounty as $key => $country) {
      foreach ($rowsCategory as $category) {
        if($country['ad_id'] == $category['ad_id']) {
          array_push($ads, $country);
        }
      }
    }

    foreach($ads as $row) {
    echo <<< text
        <div class="job-item" id={$row['product_id']}>
          <img class="ad-item-img" src={$row['ad_image']} alt="">
          <div class="place-and-category">
              <p class="job-place">{$row['ad_city']}</p>
              <div class="job-category">{$row['ad_category']}</div>
          </div>
          <p class="job-title">{$row['ad_title']}</p>
          <p class="job-date">Prijave do: {$row['ad_expire_time']}</p>
        </div>
      text;
    }
  }

?>
