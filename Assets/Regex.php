<?php
/**
 * Created by PhpStorm.
 * User: Kabbali
 * Date: 30/04/2018
 * Time: 3:33 PM
 */

class Regex
{
    public static $PATTERNS = array(
        //CHANGE DATE TIME FORMAT
        0=>'/(\d{4})-(\d{2})-(\d{2}) (.{8})/',
        //DEPENDING OF LOG MONTH, REPLACE THE NUMBER FOR THE THREE FIRST LETTERS
        1=>'/(\d{2}\/)01(\/\d{4})/',
        2=>'/(\d{2}\/)02(\/\d{4})/',
        3=>'/(\d{2}\/)03(\/\d{4})/',
        4=>'/(\d{2}\/)04(\/\d{4})/',
        5=>'/(\d{2}\/)05(\/\d{4})/',
        6=>'/(\d{2}\/)06(\/\d{4})/',
        7=>'/(\d{2}\/)07(\/\d{4})/',
        8=>'/(\d{2}\/)08(\/\d{4})/',
        9=>'/(\d{2}\/)09(\/\d{4})/',
        10=>'/(\d{2}\/)10(\/\d{4})/',
        11=>'/(\d{2}\/)11(\/\d{4})/',
        12=>'/(\d{2}\/)12(\/\d{4})/',
        //FIT EACH FIELD WITH OUR SINCRO FORMAT
        13=>'/(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})(\t|\s{1,10})(\[.*\])(\t|\s{1,10})(\S*)(\t|\s{1,10})(\S*)(\t|\s{1,10})(\S*)(\t|\s{0,10})/'
    );
    public static $REPLACES = array(
        //CHANGE DATE TIME FORMAT
        0=>'[$3/$2/$1:$4 -0500]',
        //DEPENDING OF LOG MONTH, REPLACE THE NUMBER FOR THE THREE FIRST LETTERS
        1=>'$1Jan$2',
        2=>'$Feb$2',
        3=>'$1Mar$2',
        4=>'$1Apr$2',
        5=>'$1May$2',
        6=>'$1Jun$2',
        7=>'$1Jul$2',
        8=>'$1Aug$2',
        9=>'$1Sep$2',
        10=>'$1Oct$2',
        11=>'$1Nov$2',
        12=>'$1Dec$2',
        //FIT EACH FIELD WITH OUR SINCRO FORMAT
        13=>'$1 $7 $5 $3 "GET $9 HTTP/1.1" 200 100'
    );

}