<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    /* Default styles for input groups */
    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .input-group label {
      margin-right: 20px;
      font-weight: bold;
      color: #333;
    }

    .input-group input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      flex: 1;
    }

    /* Styles for dropdown button */
    #filter-dropdown-button {
      padding: 10px;
      background-color: #222;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    #filter-dropdown-button:hover {
      background-color: #444;
    }

    .filter-cancel-button {
      padding: 7px 8px;
      background-color: #222;
      text-decoration: none;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    .filter-cancel-button a:hover {
      background-color: #444;
    }

    /* Styles for filter section */
    #filter-section {
      display: none;
      position: absolute;
      z-index: 100;
      top: 160px;
      left: 250px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    #filter-section.visible {
      display: block;
    }

    #filter-section ul {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    #filter-section ul li {
      margin-bottom: 10px;
    }

    #filter-section button {
      padding: 10px 20px;
      background-color: #222;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    #filter-section button:hover {
      background-color: #444;
    }

    @media screen and (max-width: 600px) {

      /* Styles for small screens */
      #filter-section {
        position: static;
        margin-top: 20px;
      }

      .input-group {
        flex-direction: column;
        margin-bottom: 20px;
      }

      .input-group label {
        margin-bottom: 5px
      }
    }
  </style>
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
            <option value="10">18k</option>
            <option value="14">20k</option>
            <option value="18">22k</option>
            <option value="22">24k</option>
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