<?php

/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 25/11/2018
 * Time: 2:37
 */

class Available
{
    /**
     * Days to have the book at home
     */
    const DAYSOFLEND = 20;
    /**
     * Limit of books to have at home
     */
    const LIMITBOOKS = 20;

    /**
     * Determine if a book is available for a date. Return the iID Copy if is available, else -1.
     * @param $isbn
     * @param $date
     * @return int|mixed|string
     */
    static function bookAvailable($isbn, $date)
    {
        $copies = Available::copiesOfBook($isbn);
        $copyAvailable = "";

        foreach ($copies as $copy) {
            if (Available::copyAvailable($copy, $date)) {
                $copyAvailable = $copy;
                break;
            };
        }
        if ($copyAvailable == "") $copyAvailable = -1;
        return $copyAvailable;
    }


    /**
     * Determine if one copy is available.
     * @param $id_copy
     * @param $date
     * @return bool
     */
    static function copyAvailable($id_copy, $date)
    {
        echo "id_copy = " . $id_copy . "<br/>";
        $startDateNewReserve = date_create($date);
        $result = false;

        if (!Available::copyLend($id_copy,$date))return false;

        $bigDateReserveStart = "";
        $smallDateReserveStart = "";

        $datesReserves = Available::copyDayReserved($id_copy);
        if (sizeof($datesReserves) < 1) {
            $result = true;
        } else {
            foreach ($datesReserves as $dateReserve) echo "</br>date reserve = " . date_format($dateReserve, "Y/m/d");

            for ($i = 0; $i < count($datesReserves); $i++) {

                if ($startDateNewReserve >= $datesReserves[count($datesReserves) - 1]) {
                    $bigDateReserveStart = date_create("1/1/3000");
                    $smallDateReserveStart = clone $datesReserves[count($datesReserves) - 1];
                }

                if ($startDateNewReserve <= $datesReserves[$i]) {
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

            echo "</br></br>diff value start = " . $diffValueStart;
            echo "</br>diff value end = " . $diffValueEnd;

            if ($diffValueStart > 0) echo "</br></br>start true"; else echo "</br></br>start false";
            if ($diffValueEnd > 0) echo "</br>end true"; else echo "</br>end false";

            if ($diffValueEnd > 20 && $diffValueStart > 0) {
                $result = true;
                echo "</br><b>reserve true</b><br/><br/>";
            } else {
                $result = false;
                echo "</br><b>reserve false</b><br/><br/>";
            }
        }
        return $result;
    }


    /**
     * Return de dates what a copy reserved
     * @param $id_copy
     * @return array
     */
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

    /**
     * Return teh number of copys for one ISBN
     * @param $isbn
     * @return string
     */
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

    /**
     * Return the number of copys for one ISBN
     * @param $isbn
     * @return array
     */
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

    /**
     * Return if a copy is lend now or not
     * @param $id_copy
     * @param $date
     * @return bool
     */
    static function copyLend($id_copy, $date)
    {
        include('connection_data2.inc');
        $startDateNew = date_create($date);
        $startDateLend = "";
        $copyStatus = "";

        $sentenciaSQL = "SELECT returned,start_time_lend FROM lend WHERE id_copy='$id_copy'; ";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $startDateLend = date_create($row['start_time_lend']);
            $copyStatus = $row['returned'];
        }

        if ($copyStatus == "") return true;

        $diffDate = date_diff($startDateLend, $startDateNew);
        $diffValue = intval($diffDate->format("%R%a"));

        // echo $diffValue;

        if ($diffValue > 20 || $copyStatus == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine if a book is previously reserved.
     * @param $dni
     * @return int|string
     */
    static function bookReserved($dni)
    {
        include('connection_data2.inc');

        $copyReserved="";
        $startDate = strval(date_format(date_create(), "Y/m/d"));

        $sentenciaSQL = "SELECT id_copy FROM reserve WHERE start_time_reserve='$startDate' AND dni='$dni'";
        $sql_result = $connexion->query($sentenciaSQL);

        while ($row = mysqli_fetch_assoc($sql_result)) {
            $copyReserved = $row['id_copy'];
        }

        if ($copyReserved == "") $copyReserved = -1;
        return $copyReserved;

    }

}