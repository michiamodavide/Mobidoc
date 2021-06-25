<?php

if (isset($_GET['booking_id']) && !empty($_GET['booking_id'])){

    include ("connect.php");
    $sql_book = "select booking_id, apoint_time, patient_id from bookings where booking_id='".$_GET['booking_id']."'";
    $sql_book_result = mysqli_query($conn, $sql_book);
    $sql_book_row = mysqli_fetch_array($sql_book_result);

//    get patient address

    $sql_patient = "select address from paziente_profile where paziente_id='".$sql_book_row['patient_id']."'";
    $sql_patient_result = mysqli_query($conn, $sql_patient);
    $patient_row = mysqli_fetch_array($sql_patient_result);

    $event = array(
        'id' => $sql_book_row['booking_id'],
        'title' => 'Mobidoc Visit',
        'description' => '',
        'datestart' => $sql_book_row['apoint_time'],
        'dateend' => $sql_book_row['apoint_time'],
        'address' => $patient_row['address']
    );

// Convert times to iCalendar format. They require a block for yyyymmdd and then another block
// for the time, which is in hhiiss. Both of those blocks are separated by a "T". The Z is
// declared at the end for UTC time, but shouldn't be included in the date conversion.

// iCal date format: yyyymmddThhiissZ
// PHP equiv format: Ymd\This


    function dateToCal($time) {
        return date('Ymd\THis\Z', strtotime($time));
    }

    //DTEND:' . dateToCal(date($event['dateend'], strtotime("+30 minutes"))) . '
    //DTSTAMP:' . time() . '
// Build the ics file
    $ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
UID:' . md5($event['title']) . '
LOCATION:' . addslashes($event['address']) . '
DESCRIPTION:' . addslashes($event['description']) . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . dateToCal($event['datestart']) . '
DTEND:' . dateToCal($event['dateend']) . '
END:VEVENT
END:VCALENDAR';


    if (isset($_GET['fl']) && !empty($_GET['fl'])){
        print_r($ical);
        exit();
    }

//set correct content-type-header
    if($event['id']){
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename=mobidoc-visit.ics');
        echo $ical;
    } else {
        // If $id isn't set, then kick the user back to home. Do not pass go,
        // and do not collect $200. Currently it's _very_ slow.
        header('Location: /');
    }
}else{
    header('Location: /');
}

?>