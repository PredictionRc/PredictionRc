<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <link rel="stylesheet" href="mystyle.css">
    <title>TOP 5 Predictions</title>
</head>
    <body>
        <form action="lockedIn.php" method="GET">
        <h1><u>SUBMIT YOUR ENTRY BELOW</u></h1>    
        <h3>RACE EVENT- {{EVENT_NAME}}</h3>        
            <div>    
                <label for="raceClass">Choose Pro Classes:</label>
                    <select name="Event_Class" id="raceClass">
                        <option value="proNitroBuggy">Pro Nitro Buggy (8th scale)</option>
                        <option value="proNitroTruggy">Pro Nitro Truggy (8th scale)</option>
                        <option value="ProElecBuggy">Pro Electric Buggy (8th scale)</option>
                        <option value="ProElecTruggy">Pro Electric Truggy(8th scale)</option>
                        <option value="mod2wd">MOD 2WD (10th scale)</option>
                        <option value="mod4wd">MOD 4WD (10th scale)</option>
                        <option value="modStadium">MOD Stadium Truck (10th scale)</option>
                    </select>
            </div>
                <br>
            <div>
                <label>1st Place</label>
                <input name="First_Place" type="text" id ="firstPlace" placeholder="Racer First and Last Name" required>
            </div> 
            <br>
            <div>
                <label>2nd Place</label>
                <input name="Second_Place" type="text" id ="secondPlace" placeholder="Racer First and Last Name" required>
            </div>
            <br>
            <div>
                <label>3rd Place</label>
                <input name="Third_Place" type="text" id ="thirdPlace" placeholder="Racer First and Last Name" required>
            </div> 
            <br>
            <div>
                <label>4th Place</label>
                <input name="Fourth_Place" type="text" id ="fourthPlace" placeholder="Racer First and Last Name" required>
            </div>
            <br>
            <div>
                <label>5th Place</label>
                <input name="Fifth_Place" type="text" id ="fifthlace" placeholder="Racer First and Last Name" required>
            </div>
            <br>
            <h3>Tie Breaker</h3>
            <div>
                <label>Lap Difference from 1st - 5th</label>
                <input name="Lap_Difference" type="number" id ="lapDifference" placeholder="Lap Difference" required>
            </div>
            <br>
            <div>
                <label>Time Difference from 1st - 2nd</label>
                <input name="First_Second_Place_Difference" type="number" id ="timeDifferenceFirst" placeholder="Time Difference" step=".01" required>
            </div>
            <br>
            <div>
                <label>Time Difference from 2st - 3nd</label>
                <input name="Second_Third_Place_Difference" type="number" id ="timeDifferenceSecibd" placeholder="Time Difference" step=".01" required>
            </div>
            <br>
            <div>
                <input type="reset" value="Reset">
                <button type="submit">Submit</button>
            </div> 
            <div>
            <?php 
            echo ""
            ?>
            </div>
        </form>
    </body>
</html>