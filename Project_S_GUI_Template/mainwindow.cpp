#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QString>
#include <QDateTimeEdit>
#include <QTime>


MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);
}

MainWindow::~MainWindow()
{
    delete ui;
}



//Upon clicking the "add room" button, the listWidget will pass the variables to be displayed in the list
void MainWindow::on_pushButton_5_clicked()
{
    //Adds room to listWidget
    ui->listWidget->addItem(room);

    //Adds room number to listWidget_2
    ui->listWidget_2->addItem(roomNumber);

    //Adds var monday to listWidget_3
    ui->listWidget_3->addItem(mEndTime);

    //Adds var tuesday to listWidget_4
    ui->listWidget_4->addItem(tEndTime);

    //Adds var wednesday to listWidget_5
    ui->listWidget_5->addItem(wEndTime);

    //Adds var thursday to listWidget_6
    ui->listWidget_6->addItem(thEndTime);

    //Adds var friday to listWidget_&
    ui->listWidget_7->addItem(fEndTime);

    //Clears the Bldg/Dept lineEdit field
    ui->lineEdit->clear();

    //Clears the room lineEdit field
    ui->lineEdit_2->clear();

    //Clears all checked boxes
    ui->checkBox->setChecked(false);
    ui->checkBox_2->setChecked(false);
    ui->checkBox_3->setChecked(false);
    ui->checkBox_4->setChecked(false);
    ui->checkBox_5->setChecked(false);
    ui->checkBox_6->setChecked(false);
    ui->checkBox_7->setChecked(false);

    //Reset timeEdit widget back to 12:00am
    QTime time(0, 0, 0, 0);
    ui->timeEdit->setTime(time);
    ui->timeEdit_2->setTime(time);
    ui->timeEdit_3->setTime(time);
    ui->timeEdit_4->setTime(time);
    ui->timeEdit_5->setTime(time);
    ui->timeEdit_6->setTime(time);
    ui->timeEdit_7->setTime(time);
    ui->timeEdit_8->setTime(time);
    ui->timeEdit_9->setTime(time);
    ui->timeEdit_10->setTime(time);
    ui->timeEdit_11->setTime(time);
    ui->timeEdit_12->setTime(time);
    ui->timeEdit_13->setTime(time);
    ui->timeEdit_14->setTime(time);


}

/*
 *  BEGINNING CHECK BOX WIDGETS
 **/

//Upon clicking the "add room" button, the dept/bldg input will be passed to the room variable
void MainWindow::on_lineEdit_textChanged(const QString &arg1)
{
    room = arg1;
}

//Passes the room number from the first line edit in Basic Info
void MainWindow::on_lineEdit_2_textChanged(const QString &arg1)
{
    roomNumber = arg1;
}

//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_clicked()
{
    monday = "Monday";
}
//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_2_clicked()
{
    tuesday = "Tuesday";
}
//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_3_clicked()
{
    wednesday = "Wednesday";
}

//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_4_clicked()
{
    thursday = "Thursday";
}

//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_5_clicked()
{
    friday = "Friday";
}

//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_6_clicked()
{
    saturday = "Saturday";
}

//If Day is clicked overrides the initial N/A assignment
void MainWindow::on_checkBox_7_clicked()
{
    sunday = "Sunday";
}
/*
 * ENDING CHECK BOX WIDGET
 * */

/*
 *  BEGINNING TIME WIDGET
 *  Beginning and end time widgets for each day of the week
 *  first camel case indicates day of the week followed by start and end times
 **/

//assigns beginning time
void MainWindow::on_timeEdit_timeChanged(const QTime &time)
{
        if (time.toString() == "00:00:00")
            mBegTime = "";
        else
            mBegTime = time.toString();

}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_2_timeChanged(const QTime &time)
{
    if (mBegTime != "")
        mEndTime = mBegTime + " - " + time.toString();
    else
        mEndTime = "N/A";

}
//assigns beginning time
void MainWindow::on_timeEdit_5_timeChanged(const QTime &time)
{
    if (time.toString() == "00:00:00")
        tBegTime = "";
    else
        tBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_6_timeChanged(const QTime &time)
{
    if (tBegTime != "")
        tEndTime = tBegTime + " - " + time.toString();
    else
        tEndTime = "N/A";
}
//assigns beginning time
void MainWindow::on_timeEdit_7_timeChanged(const QTime &time)
{
    if (time.toString() == "00:00:00")
        wBegTime = "";
    else
        wBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_8_timeChanged(const QTime &time)
{
    if (wBegTime != "")
        wEndTime = wBegTime + " - " + time.toString();
    else
        wEndTime = "N/A";
}
//assigns beginning time
void MainWindow::on_timeEdit_9_timeChanged(const QTime &time)
{
    if (time.toString() == "00:00:00")
        thBegTime = "";
    else
        thBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_10_timeChanged(const QTime &time)
{
    if (thBegTime != "")
        thEndTime = thBegTime + " - " + time.toString();
    else
        thEndTime = "N/A";
}
//assigns beginning time
void MainWindow::on_timeEdit_11_timeChanged(const QTime &time)
{
    if (time.toString() == "00:00:00")
        fBegTime = "";
    else
        fBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_12_timeChanged(const QTime &time)
{
    if (fBegTime != "")
        fEndTime = fBegTime + " - " + time.toString();
    else
        fEndTime = "N/A";
}

//assigns beginning time
void MainWindow::on_timeEdit_13_timeChanged(const QTime &time)
{
    sBegTime = time.toString();
}

//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_14_timeChanged(const QTime &time)
{
    sEndTime = sBegTime + " - " + time.toString();
}

//assigns beginning time
void MainWindow::on_timeEdit_15_timeChanged(const QTime &time)
{
    suBegTime = time.toString();
}

//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_16_timeChanged(const QTime &time)
{
    suEndTime = suBegTime + " - " + time.toString();
}

/*
 * ENDING TIME WIDGET
 * */


//Remove room pushButton
void MainWindow::on_pushButton_6_clicked()
{
    ui->listWidget->currentItem()->~QListWidgetItem();
    ui->listWidget_2->currentItem()->~QListWidgetItem();
    ui->listWidget_3->currentItem()->~QListWidgetItem();
    ui->listWidget_4->currentItem()->~QListWidgetItem();
    ui->listWidget_5->currentItem()->~QListWidgetItem();
    ui->listWidget_6->currentItem()->~QListWidgetItem();
    ui->listWidget_7->currentItem()->~QListWidgetItem();

}



