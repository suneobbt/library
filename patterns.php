<?php
/**
 * Created by PhpStorm.
 * User: Babot
 * Date: 07/12/2018
 * Time: 4:59
 */

//const PATTERN_="";
//const TITLE_="";

const PATTERN_TEXT ="[^*]+";
const TITLE_TEXT ="No accepted *, $ characters";

const PATTERN_ISBN ="[0-9]{13}";
const TITLE_ISBN ="ISBN are composed by 13 numeric characters";

const PATTERN_EDITION="[0-9]{1,}";
const TITLE_EDITION="At least one number";

const PATTERN_DESCRIPTION="[0-9]{1,}";
const TITLE_DESCRIPTION="For description, we understand how may pages has a book, at least one, no?";

const PATTERN_CONDITION="((good)|(medium)|(bad))";
const TITLE_CONDITION="The condition only can be good, medium or bad; not sausage or frog! ";

const PATTERN_YEAR="[0-9]{4}";
const TITLE_YEAR="YYYY format";

const PATTERN_DNI="((\d{8})([A-Z]{1}))";
const TITLE_DNI="00000000X format";

const PATTERN_PASSWORD=".{5,}";
const TITLE_PASSWORD="at least 5 characters";

const PATTERN_USER_TYPE="[0|1|2]";
const TITLE_USER_TYPE="Only 0, 1 or 2 are valid values";

const PATTERN_PHONE_NUMBER="[0-9]{9}";
const TITLE_PHONE_NUMBER="Phone numbers need to have 9 numeric characters";

const PATTERN_POSTAL_CODE="[0-9]{5}";
const TITLE_POSTAL_CODE="Postal codes need to have 5 numeric characters";

const PATTERN_BOOLEAN="((true)|(false))";
const TITLE_BOOLEAN="True or false?";

const PATTERN_EMAIL="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$";
const TITLE_EMAIL="Standard e-mail required";

