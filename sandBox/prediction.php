<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.divcenter {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.adcontainer {
  height: 100px;
  width: 100%;
}

.bg {
  /* The image used */
  background-color: #727171;
  /* Full height */
  height: 100%;
  width: 100%;

}

.p1 {
  font-family: "Fantasy", "Courier New", monospace;
  font-weight: bold;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;
}

.p2 {
  font-family: "Fantasy", "Courier New", monospace;
  font-weight: bold;
  font-size: 25px;
  max-width: 100%;
  margin: 10px;
  word-wrap: break-word;
  text-align: center;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
td {
  text-align: center;
}

</style>
</head>
<body class="bg">

<div class="divcenter">
  <img src="image/indexLogo.jpg" alt="Avatar"  class="avatar">
</div>

<div>  
  <table style="width:100%">
    <tr>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"> 
    </tr>
  </table>
</div>

<p class="p1">top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. top 5 add verbiage here. </p>

<form action="lockedIn.php" method="GET">

<p class="p2">1/8th SCALE Predictions</p>        

<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 20% 20% 20% 20% 20%; width:100%">
  <caption style="grid-column: span 5;">Pro Buggy Class</caption>
    <tr>
      <th></th>
      <th>Nitro Buggy​​</th>
      <th>Elec Buggy</th>
    </tr>
    <tr>
      <td>1st</td>
      <td><input name="First_Place" type="text" id ="firstPlace" placeholder="Racer First & Last Name" required></td>
      <td><input name="First_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>2nd</td>
      <td><input name="Second_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Second_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>3rd</td>
      <td><input name="Third_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Third_Place" type="text" id ="thirdPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>4th</td>
      <td><input name="Fourth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Fourth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>5th</td>
      <td><input name="Fifth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Fifth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>    
    </tr>
</table>

<br>  <br>  <br>  

<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 20% 20% 20% 20% 20%; width:100%">
  <caption style="grid-column: span 5;">Pro Truggy Class</caption>
    <tr>
      <th></th>
      <th>Nitro Truggy</th>
      <th>Elec Truggy</th>
    </tr>
    <tr>
      <td>1st</td>
      <td><input name="First_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="First_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>2nd</td>
      <td><input name="Second_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Second_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>3rd</td>
      <td><input name="Third_Place" type="text" id ="thirdPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Third_Place" type="text" id ="thirdPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>4th</td>
      <td><input name="Fourth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Fourth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
    </tr>
    <tr>
      <td>5th</td>
      <td><input name="Fifth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>
      <td><input name="Fifth_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required></td>    
    </tr>
</table>

<br>  <br>  <br>  

<table xmlns="http://www.w3.org/1999/xhtml" style="grid-template-columns: 20% 20% 20% 20% 20%; width:100%">
  <caption style="grid-column: span 5;">Tie Breaker - Pro Nitro Buggy</caption>
    <tr>
      <td>Lap differenc 1st-5th</td>
      <td><input name="Lap_Difference" type="number" id ="lapDifference" placeholder="Lap Difference" required></td>
    </tr>
    <tr>
      <td>Time Difference 1st - 2nd</td>
      <td><input name="First_Second_Place_Difference" type="number" id ="timeDifferenceFirst" placeholder="Time Difference" step=".01" required></td>
    </tr>
    <tr>
      <td>Time difference 2nd - 3rd</td>
      <td><input name="Second_Third_Place_Difference" type="number" id ="timeDifferenceSecibd" placeholder="Time Difference" step=".01" required></td>
    </tr>
</table>

<br>  <br>  <br>  
            

<div class="divcenter">
  <input type="reset" value="Reset">
  <button type="submit">Submit</button>
</div> 
</form>

<table style="width:100%">
  <tr>
    <td><img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
    <td><img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer"></td>
  </tr>
  <tr>
    <td>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer">
    </td>
    <td>
      <img src="image/addSale.jpg" alt="Advertising space for Rent" class="adcontainer">
    </td>
  </tr>
</table>

<script>

</script>

</body>
</html>
