<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITENAME ?></title>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/pawnArticleFilter.css"> 
</head>

<body>
  <button id="filter-dropdown-button">Filter</button>

  <a class="filter-cancel-button" href="<?php echo URLROOT ?>/mgPawnArticles/index">Cancel</a>


  <form action="<?php echo URLROOT ?>/mgPawnArticles/filter" method="POST">
    <div class="filter" id="filter-section">
      <ul>
        <li>
          <label for="max-price">Max Price:</label>
          <input type="number" id="max-price" name="max-price">
        </li>
        <li>
          <label for="min-price">Min Price:</label>
          <input type="number" id="min-price" name="min-price">
        </li>
        <li>
          <label for="created-date">min Date:</label>
          <input type="date" id="created-date" name="created-date">
        </li>
        <li>
          <label for="end-date">Max Date:</label>
          <input type="date" id="end-date" name="end-date">
        </li>
        <li class="li">
          <label for="karatage">Karatage:</label>
          <select id="karatage" name="karatage">
            <option value="">Select Karatage</option>
            <option value="18">18k</option>
            <option value="20">20k</option>
            <option value="22">22k</option>
            <option value="24">24k</option>
          </select>
        </li>
        <li class="li">
          <label for="type">Type:</label>
          <select id="type" name="type">
            <option value="">Select Type</option>
            <option value="ring">Ring</option>
            <option value="bracelet">Bracelet</option>
            <option value="necklace">Necklace</option>
            <option value="earrings">Earrings</option>
          </select>
        </li>
        <li class="li">
          <label for="min-weight">Min Weight (g):</label>
          <input type="number" id="min-weight" name="min-weight" step="0.01">
        </li>
        <li class="li">
          <label for="max-weight">Max Weight (g):</label>
          <input type="number" id="max-weight" name="max-weight" step="0.01">
        </li>
      </ul>

      <button type="submit" id="filter-button">Filter</button>
      <a class="filter-cancel-button" href="<?php echo URLROOT ?>/mgPawnArticles/index">Cancel</a>
    </div>

  </form>




</body>
<script>
  const filterBtn = document.getElementById('filter-dropdown-button');
  const filterSection = document.getElementById('filter-section');

  filterBtn.addEventListener('click', () => {
    filterSection.classList.toggle('visible');
  });
</script>

</html>