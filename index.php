<?php

    include 'resources/php/MainUI/MainUI.php';

    session_start();

    if (!isset($_SESSION['view'])) {
        $_SESSION['view'] = 'steps';
    }

    $CURRENT_VIEW = $_SESSION['view'];

    switch($CURRENT_VIEW) {
        case 'steps':
            //echo '- steps... ';
            MainUI::showSteps();
        break;
        case 'schedule':
            //echo '- schedule... ';

            if (isset($_SESSION['stepsData'])) {
                //echo 'data is set! -- drawing schedule';

                // $data = $_POST['data'];
                // $roomCount = $data['rooms']->length;
                MainUI::showSchedule();
            } else {
                //echo 'but data isn\'t set -- drawing steps';

                MainUI::showSteps();
            }
        break;
        default:
            //echo 'default case!!! ';

            MainUI::showSteps();
        break;
    }

?>