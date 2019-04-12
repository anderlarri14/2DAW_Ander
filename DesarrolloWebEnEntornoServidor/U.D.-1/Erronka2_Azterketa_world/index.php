<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <title>World database</title>
</head>
<body>
    <h2>World database</h2>
    <br>
    Show all countries in selected continent:
    <form action="viewCountry">
       <select name ='cmbContinent'>
            <option value="Africa">Africa</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Asia">Asia</option>
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="Oceania">Oceania</option>
            <option value="South America">South America</option>
       </select>
       <input type="submit" value="ok" name="btnOkContinent" />
    </form>
    <br>

    <a href="newCity">Insert a new city </a> <br><br>
    <a href="spanish">Countries where spanish is the official language </a> <br><br>


    <form action="viewCity">
        Insert city id to consult city card:<input name="idCity"/>
        <input type="submit" value="ok" name="btnOkCityCard" />
    </form>

</body>
</html>
