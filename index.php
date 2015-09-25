<?php

    include 'resources/php/MainUI/MainUI.php';

    session_start();

    if (!isset($_SESSION['view'])) {
        $_SESSION['view'] = 'steps';
    }

    $CURRENT_VIEW = $_SESSION['view'];

    switch($CURRENT_VIEW) {
        case 'steps':
            MainUI::showSteps();
        break;
        case 'schedule':
            if (isset($_SESSION['stepsData'])) {
                MainUI::showSchedule();
            } else {
                MainUI::showSteps();
            }
        break;
        default:
            MainUI::showSteps();
        break;
    }

?>
