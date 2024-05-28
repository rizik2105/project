<!DOCTYPE html>
<html>
<head>
  <style>
    .button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      outline: none;
      color: #fff;
      background-color: #4CAF50;
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px #999;
      margin-right: 10px; /* Adds space between buttons */
    }

    .button:hover {background-color: #3e8e41}

    .button:active {
      background-color: #3e8e41;
      box-shadow: 0 2px #666;
      transform: translateY(2px);
    }

    .form-inline {
      display: inline-block;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <td>
        <form action='borrow.php' method='post' class="form-inline">
          <input type='hidden' value='<?php echo $row["sno"]; ?>' name='sno'>
          <input type='submit' value='Borrow' class="button">
        </form>
        <form action='location.php' method='post' class="form-inline">
          <input type='hidden' value='<?php echo $row["sno"]; ?>' name='sno'>
          <input type='submit' value='Location' class="button">
        </form>
      </td>
    </tr>
  </table>
</body>
</html>
