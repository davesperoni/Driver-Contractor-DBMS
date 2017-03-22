<?php
@ob_start();
session_start();
?>

<?php
$con = mysqli_connect("127.0.0.1", "homestead", "secret");
mysqli_select_db($con, "wildlifeDB");
?>

    <html>
    <!-- Developed by David Speroni, on my honor. -->
    <head>
        <meta charset="utf-8">
        <title>Contractor System by Viviann Rutan</title>
        <meta name="description" content="">
        <link rel="stylesheet" href="conStyles.css">
        <h1>Contractor System by David Speroni</h1>
        <p>*Output is at the bottom of the page</p>
    </head>

<body>

    <fieldset>
        <h2>Enter Contractor</h2>

        <form class="pure-form pure-form-stacked" action="Main.php" method="post">

            <label>Contractor ID: </label> <input type="text" id="conID" name="conID"/>
            <br/><br/>
            <label>First name: </label> <input type="text" id="fName" name="fName"/>
            <label>Middle Initial: </label> <input type="text" id="cMI" name="cMI"/>
            <label>Last name: </label> <input type="text" id="lName" name="lName"/>
            <br/><br/>
            <label>House Number: </label> <input type="text" name="cHouse"/>
            <label>Street: </label> <input type="text" name="cStreet"/>
            <br/><br/>
            <label>City: </label> <input type="text" name="cCity"/>
            <label>Zip: </label> <input type="text" name="cZip"/>
            <br/><br/>
            <label>Fee: </label> <input type="text" name="cFee"/>

            <br/><br/>
            <labeL>State:</labeL>
            <select>

                <?php

                $res = mysqli_query($con, "select * from HomeState");
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <option><?php echo $row["StateAbb"]; ?></option>
                    <?php
                }

                ?>

            </select>
            <labeL> Country: </labeL>
            <select>

                <?php

                $res = mysqli_query($con, "select * from Country");
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <option><?php echo $row["CountryAbb"]; ?></option>
                    <?php
                }

                ?>

            </select>


            <input type="submit" value="Insert" name="insertCon"/>
            <input type="submit" value="Commit" name="conCommit"/>
    </fieldset>
    </form>
    <fieldset>

        <h2>Enter Driver</h2>

        <form action="Main.php" method="post">
            <label>Driver ID: </label> <input type="text" id="dID" name="dID"/>
            <br/><br/>
            <label>First name: </label> <input type="text" id="dfName" name="dfName"/>
            <label>Middle Initial: </label> <input type="text" id="dMI" name="dMI"/>
            <label>Last name: </label> <input type="text" id="dlName" name="dlName"/>
            <br/><br/>
            <label>House number: </label> <input type="text" id="dlName" name="dHouse"/>
            <label>Street: </label> <input type="text" id="dlName" name="dStreet"/>
            <br/><br/>

            <label>City: </label> <input type="text" id="dlName" name="dCity"/>

            <br/><br/>
            <labeL>State:</labeL>
            <select>

                <?php

                $res = mysqli_query($con, "select * from HomeState");
                while ($row = mysqli_fetch_array($res)) {
                    ?>
                    <option><?php echo $row["StateAbb"]; ?></option>
                    <?php
                }
                ?>

            </select>
            <labeL> Country: </labeL>
            <select>

                <?php

                $res = mysqli_query($con, "select * from Country");
                while ($row = mysqli_fetch_array($res)) {
                 ?>
                    <option><?php echo $row["CountryAbb"]; ?></option>
                    <?php
                }

                ?>

            </select>

            <label>Zip: </label> <input type="text" id="dlName" name="dZip"/>
            <br/><br/>

            <label>DOB (YYYY-MM-DD): </label> <input type="text" id="dlName" name="dDOB"/>
            <br/><br/>

            <label>CDL: </label> <input type="text" id="dlName" name="dCDL"/>
            <br/><br/>

            <label>CDL Date (YYYY-MM-DD): </label> <input type="text" id="dlName" name="dCDLDate"/>
            <br/><br/>

            <label>Hire Date (YYYY-MM-DD): </label> <input type="text" id="dlName" name="dHire"/>
            <br/><br/>

            <label>Termination Date (YYYY-MM-DD): </label> <input type="text" id="dlName" name="dTerm"/>
            <br/><br/>

            <label>Contractor ID: </label> <input type="text" id="cdID" name="cdID"/>
            <br/><br/>
            <input type="submit" value="Commit" name="DCommit"/>
            <br/><br/>
            <input type="submit" value="Show Cons & Drivers" name="conDriver"/>
            <p>*Output is at the bottom of the page</p>
            <input type="submit" value="Delete Contractor data!" name="deleteAll"/>
    </fieldset>
    </form>
    <fieldset>
        <h2>Enter Equipment</h2>

        <form action="Main.php" method="post">
            <label>ID: </label> <input type="text" id="dID" name="eID"/>
            <label>Vin Number: </label> <input type="text" id="dID" name="vin"/>
            <br/><br/>
            <label>Make: </label> <input type="text" id="dfName" name="make"/>
            <label>Model: </label> <input type="text" id="dMI" name="model"/>
            <label>Year: </label> <input type="text" id="dlName" name="year"/>
            <br/><br/>
            <label>Price: </label> <input type="text" id="dlName" name="price"/>
            <label>License: </label> <input type="text" id="dlName" name="license"/>
            <label>Driver ID: </label> <input type="text" id="dlName" name="edID"/>
            <input type="submit" value="Commit" name="ECommit"/>
            <input type="submit" value="Sum of Fees" name="sumFee"/>

    </fieldset>
</body>
    </html>
    <!--Start main processing php here -->
<?php
/*session_start();*/
if (isset($_POST['sumFee'])) {
    echo 'Sum of Fees: ';
}


if (isset($_POST['ECommit'])) {
/*
    $con = mysql_connect("127.0.0.1", "homestead", "secret");
    if (!$con) {
        die("cant connect" . mysql_error());
    }
   */



    //mysql_select_db("wildlifeDB", $con);

    $eID = $_POST['eID'];
    $vin = $_POST['vin'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $license = $_POST['license'];
    $dID = $_POST['edID'];


    $newEquip = new Equipment($eID, $vin, $make, $model, $year, $price, $license, $dID);

    $eID = $newEquip->geteID();
    $vin = $newEquip->getVin();
    $model = $newEquip->getModel();
    $year = $newEquip->getYear();
    $price = $newEquip->getPrice();
    $license = $newEquip->getLicense();
    $dID = $newEquip->getdID();
    $make = $newEquip->getMake();

    $sql = "INSERT INTO Equipment (ID, VinNumber, Make, Model, EquipmentYear, priceAcquired, LicenseNumber, DriverID, LastUpdatedBy, LastUpdated) VALUES ('$eID', '$vin','$make', '$model', '$year', '$price', '$license', '$dID', 'David Speroni', '2017-03-12')";

    mysql_query($sql, $con);

    mysql_close($con);
}


if (isset($_POST['deleteAll'])) {
    $con = mysql_connect("127.0.0.1", "homestead", "secret");
    mysql_select_db('wildlifeDB', $con);
    if (!$con) {
        die("cant connect" . mysql_error());
    }

    $dropsql = 'DELETE FROM Contractor';
    if (mysql_query($dropsql, $con)) {
        echo "Database was successfully dropped\n";
    } else {
        echo 'Error dropping database: ' . mysql_error() . "\n";
    }
}


if (isset($_POST['DCommit'])) {

    $con = mysql_connect("127.0.0.1", "homestead", "secret");
    if (!$con) {
        die("cant connect" . mysql_error());
    }

    mysql_select_db("wildlifeDB", $con);

    $dID = $_POST['dID'];
    $fName = $_POST['dfName'];
    $dMI = $_POST['dMI'];
    $lName = $_POST['dlName'];
    $dStreet = $_POST['dStreet'];
    $dHouse = $_POST['dHouse'];
    $dCity = $_POST['dCity'];
    $dZip = $_POST['dZip'];
    $dDOB = $_POST['dDOB'];
    $dCDL = $_POST['dCDL'];
    $dCDLDate = $_POST['dCDLDate'];
    $dHire = $_POST['dHire'];
    $dTerm = $_POST['dTerm'];
    $conID = $_POST['cdID'];

    $newDriver = new Driver($dID, $fName, $dMI, $lName, $dHouse, $dStreet, $dCity, $dZip, $dDOB, $dCDL, $dCDLDate, $dHire, $dTerm, $conID);

    $dID = $newDriver->getdID();
    $fName = $newDriver->getFName();
    $lName = $newDriver->getLName();
    $dMI = $newDriver->getdMI();
    $conID = $newDriver->getConID();
    $dHouse = $newDriver->getdHouse();
    $dStreet = $newDriver->getdStreet();
    $dCity = $newDriver->getdCity();
    $dZip = $newDriver->getdZip();
    $dDOB = $newDriver->getdDOB();
    $dCDL = $newDriver->getdCDL();
    $dCDLDate = $newDriver->getdCDLDate();
    $dHire = $newDriver->getdHire();
    $dTerm = $newDriver->getdTerm();


    $from = new DateTime($dDOB);
    $to = new DateTime('today');
    $age = $from->diff($to)->y;
    echo "The Driver is " . $age . " years old.";

    if ($age >= 25 && $age <= 75) {

        $sql = "INSERT INTO Driver (DriverID, FirstName, LastName, MiddleInitial, HouseNumber, Street, CityCounty, StateAbb, CountryAbb, ZipCode, DateOfBirth, CDL, CDLDate, LastUpdatedBy, LastUpdated) VALUES ('$dID', '$fName','$lName', '$dMI', '$dHouse', '$dStreet', '$dCity', 'VA', 'US', '$dZip',  '$dDOB','$dCDL', '$dCDLDate', 'David Speroni', '2017-03-12')";

        $sqlDC = "INSERT INTO DriverContractor (ContractorID, DriverID, HireDate, TermindationDate, Salary, LastUpdatedBy, LastUpdated) VALUES ('$conID', '$dID', '$dHire', '$dTerm', '100.00', 'David Speroni', '2017-03-12')";

        mysql_query($sql, $con);

        mysql_query($sqlDC, $con);

        mysql_close($con);

    } else {

        echo "Oops! The Driver is not of age to drive! Driver not added.";
    }


}

?>


<?php
if (isset($_POST['conDriver'])) {
    $conDrives = mysqli_query($con, "select c.ContractorID, c.LastName, d.DriverID, d.LastName 
        from Contractor c left outer join DriverContractor dc
        on c.ContractorID = dc.ContractorID left outer join Driver d 
        on dc.DriverID = d.DriverID");

    while ($cdRow = mysqli_fetch_array($conDrives)) {
        echo "<br><br>Contractor ID: " . $cdRow["ContractorID"] . " is paired with Driver ID: " . $cdRow["DriverID"];
    }
}

?>

<?php
/*session_start(); */

$_SESSION['amountOfCons'] = 0;
/*$_SESSION['cons'] = new SplFixedArray(3);  */
$cons = new SplFixedArray(3);

if (isset($_POST['conCommit'])) {

  /*  $con = mysql_connect("127.0.0.1", "homestead", "secret");
    if (!$con) {
        die("cant connect" . mysql_error());
    }

    mysql_select_db("wildlifeDB", $con);*/
    /*echo print_r($_SESSION['cons']); */

    for ($i = 0; $i <= $_SESSION['amountOfCons']; $i++) {
        $conID = $_SESSION['cons'][$i]->getcConID();
        $fName = $_SESSION['cons'][$i]->getFName();
        $lName = $_SESSION['cons'][$i]->getLName();
        $cMI = $_SESSION['cons'][$i]->getConMI();
        $cHouse = $_SESSION['cons'][$i]->getConHouse();
        $cStreet = $_SESSION['cons'][$i]->getConStreet();
        $cCity = $_SESSION['cons'][$i]->getConCity();
        $cZip = $_SESSION['cons'][$i]->getConZip();
        $cFee = $_SESSION['cons'][$i]->getConFee();
        $sql = "INSERT INTO Contractor (ContractorID, FirstName, LastName, MiddleInitial, HouseNumber, Street, CityCounty, StateAbb, CountryAbb, ZipCode, Fee, LastUpdatedBy, LastUpdated) VALUES ('$conID', '$fName','$lName', '$cMI', '$cHouse', '$cStreet', '$cCity', 'VA', 'US', '$cZip', '$cFee', 'David Speroni', '2017-01-01')";

        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    }
}

if (isset($_POST['insertCon'])) {

    $conID = $_POST['conID'];
    $fName = $_POST['fName'];
    $MI = $_POST['cMI'];
    $lName = $_POST['lName'];
    $cHouse = $_POST['cHouse'];
    $cStreet = $_POST['cStreet'];
    $cCity = $_POST['cCity'];
    $cZip = $_POST['cZip'];
    $cFee = $_POST['cFee'];


    $newCon = new Contractor($conID, $fName, $MI, $lName, $cHouse, $cStreet, $cCity, $cZip, $cFee);

    $cons[0] = $newCon;

    $_SESSION['cons'] = $cons;
    $_SESSION['amountOfCons']++;

    echo "Contractor " . $_SESSION['amountOfCons'] . " inserted";
    /*print_r($_SESSION['cons']);*/


}

?>


<?php

class Equipment
{
    public function __construct($eID, $vin, $make, $model, $year, $price, $license, $dID)
    {

        $this->eID = $eID;
        $this->vin = $vin;
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
        $this->license = $license;
        $this->dID = $dID;

    }


    public function geteID()
    {
        return $this->eID;
    }

    public function getVin()
    {
        return $this->vin;
    }

    public function getMake()
    {
        return $this->make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getLicense()
    {
        return $this->license;
    }

    public function getdID()
    {
        return $this->dID;
    }

}


class Contractor
{

    var $fName = "";
    var $lName = "";


    public function __construct($conID, $fName, $MI, $lName, $cHouse, $cStreet, $cCity, $cZip, $cFee)
    {

        $this->conID = $conID;
        $this->fName = $fName;
        $this->MI = $MI;
        $this->lName = $lName;
        $this->cHouse = $cHouse;
        $this->cStreet = $cStreet;
        $this->cCity = $cCity;
        $this->cZip = $cZip;
        $this->cFee = $cFee;

    }

    public function __toString()
    {
        return $this->fName . ' ' . $this->lName;
    }

    public function getcConID()
    {

        return $this->conID;

    }

    public function getFName()
    {

        return $this->fName;

    }

    public function getLName()
    {

        return $this->lName;

    }

    public function getConMI()
    {

        return $this->MI;

    }

    public function getConHouse()
    {

        return $this->cHouse;

    }

    public function getConStreet()
    {

        return $this->cStreet;

    }

    public function getConCity()
    {

        return $this->cCity;

    }

    public function getConZip()
    {

        return $this->cZip;

    }

    public function getConFee()
    {

        return $this->cFee;

    }
}

?>

<?php

class Driver
{

    var $fName = "";
    var $lName = "";


    public function __construct($dID, $fName, $dMI, $lName, $dHouse, $dStreet, $dCity, $dZip, $dDOB, $dCDL, $dCDLDate, $dHire, $dTerm, $conID)
    {

        $this->conID = $conID;
        $this->dID = $dID;
        $this->fName = $fName;
        $this->dMI = $dMI;
        $this->dHouse = $dHouse;
        $this->lName = $lName;
        $this->dStreet = $dStreet;
        $this->dCity = $dCity;
        $this->dZip = $dZip;
        $this->dDOB = $dDOB;
        $this->dCDL = $dCDL;
        $this->dCDLDate = $dCDLDate;
        $this->dHire = $dHire;
        $this->dTerm = $dTerm;

    }


    public function __toString()
    {
        return $this->fName . ' ' . $this->lName;
    }


    public function getConID()
    {

        return $this->conID;

    }

    public function getdMI()
    {

        return $this->dMI;

    }


    public function getFName()
    {

        return $this->fName;

    }

    public function getLName()
    {

        return $this->lName;

    }

    public function getdID()
    {

        return $this->dID;

    }

    public function getdHouse()
    {

        return $this->dHouse;

    }

    public function getdStreet()
    {

        return $this->dStreet;

    }

    public function getdCity()
    {

        return $this->dCity;

    }

    public function getdZip()
    {

        return $this->dZip;

    }

    public function getdDOB()
    {

        return $this->dDOB;

    }

    public function getdCDL()
    {

        return $this->dCDL;

    }

    public function getdCDLDate()
    {

        return $this->dCDLDate;

    }

    public function getdHire()
    {

        return $this->dHire;

    }

    public function getdTerm()
    {

        return $this->dTerm;

    }


}


?>