<?php

/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 25/11/2018
 * Time: 2:37
 */

class Available
{
    const DAYSOFLEND = 20;

    static function bookAvailable($isbn, $date)
    {
        $startDateNewReserve = date_create($date);

        $bigDateReserveStart = "";
        $smallDateReserveStart = "";

        $datesReserves = Available::copyDayReserved("4");
        foreach ($datesReserves as $dateReserve) echo "</br>date reserve = " . date_format($dateReserve, "Y/m/d");

        for ($i = 0; $i < count($datesReserves); $i++) {

            if ($startDateNewReserve > $datesReserves[count($datesReserves) - 1]) {
                $bigDateReserveStart = date_create("1/1/3000");
                $smallDateReserveStart = clone $datesReserves[count($datesReserves) - 1];
            }

            if ($startDateNewReserve < $datesReserves[$i]) {
                $bigDateReserveStart = clone $datesReserves[$i];
                if ($i - 1 < 0) {
                    $smallDateReserveStart = date_create("1/1/1900");
                } else {
                    $smallDateReserveStart = clone $datesReserves[$i - 1];
                }
                break;
            }

        }

        echo "</br></br>small one   = " . date_format($smallDateReserveStart, "Y/m/d");
        echo "</br>date request     = " . date_format($startDateNewReserve, "Y/m/d");
        echo "</br>big one          = " . date_format($bigDateReserveStart, "Y/m/d");

        //diference days between dates
        date_add($smallDateReserveStart, date_interval_create_from_date_string(self::DAYSOFLEND . "days"));

        $diffDateStart = date_diff($smallDateReserveStart, $startDateNewReserve);
        $diffValueStart = intval($diffDateStart->format("%R%a"));

        date_add($startDateNewReserve, date_interval_create_from_date_string(self::DAYSOFLEND . "days"));
        $diffDateEnd = date_diff($startDateNewReserve, $bigDateReserveStart);
        $diffValueEnd = intval($diffDateEnd->format("%R%a"));

        echo"</br></br>diff value start = " . $diffValueStart;
        echo"</br>diff value end = " . $diffValueEnd;

        if($diffValueStart>0) echo"</br></br>start true";else echo "</br></br>start false";
        if($diffValueEnd>0)echo"</br>end true";else echo "</br>end false";
        if ($diffValueEnd>20&&$diffValueStart>0)echo "</br>reserve true";else echo "</br>reserve false";
    }


    static function copyDayReserved($id_copy)
    {
        include('connection_data2.inc');
        $dateReserved = array();
        $index = 0;

        $sentenciaSQL = "SELECT start_time_reserve FROM reserve WHERE id_copy='$id_copy' ORDER BY start_time_reserve ASC; ";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $dateReserved[$index] = date_create($row['start_time_reserve']);
            $index = ++$index;
        }

        return $dateReserved;
    }

    static function numberOfCopies($isbn)
    {
        include('connection_data2.inc');
        $nCopies = "";

        $sentenciaSQL = "SELECT COUNT(id_copy) as copies FROM copy WHERE isbn='$isbn'; ";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $nCopies = $row['copies'];
        }

        return $nCopies;
    }

    static function copiesOfBook($isbn)
    {
        include('connection_data2.inc');
        $index = 0;
        $copies = array();

        $sentenciaSQL = "SELECT id_copy FROM copy WHERE isbn='$isbn'; ";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $copies[$index] = $row['id_copy'];
            $index = ++$index;
        }


        return $copies;

    }

    static function copyLend($id_copy)
    {
        include('connection_data2.inc');
        $copyStatus = true;

        $sentenciaSQL = "SELECT returned FROM lend WHERE id_copy='$id_copy'; ";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $copyStatus = $row['returned'];
        }

        return $copyStatus;
    }

    static function copyReserved($id_copy)
    {


    }


}