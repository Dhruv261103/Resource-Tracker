
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lab location</title>
    <link rel="stylesheet" href="lab.css">
</head>

<body>
    <h1 data-text="Charusat Resource Tracker">Charusat Resource Tracker</h1>
    <div class="box">
        <div class="form">
            <h2>Lab</h2>
            <span>Day:</span>
            <form action="/sgp-2/lab.php" method="post">
            <div class="custom-select" style="width: 800px;">
                <select  name="lab" id="lab">
                    <option value="0">Select Day</option>
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wensday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Sunday</option>
                </select>
            </div>
            <span>Slot:</span>
            <div class="custom-select" style="width: 800px;">
                <select>
                    <option value="0">Select Slot</option>
                    <option value="1">9:10 - 10:10</option>
                    <option value="2">10:10 - 11:10</option>
                    <option value="3">12:10 - 1:10</option>
                    <option value="4">1:10 - 2:10</option>
                    <option value="5">2:20 - 3:20</option>
                    <option value="6">3:20 - 4:20</option>
                </select>
            </div>
            <button type="submit" class="btn">Searching</button>
            </form>
        </div>
    </div>
    
    
</body>

</html>