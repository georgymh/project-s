#include "mainwindow.h"
#include "ui_mainwindow.h"
#include <QString>
#include <QDateTimeEdit>


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

//Upon clicking the "add room" button, the dept/bldg input will be passed to the room variable
void MainWindow::on_lineEdit_textChanged(const QString &arg1)
{
    room = arg1;
}

//Upon clicking the "add room" button, the listWidget will pass the variables to be displayed in the list
void MainWindow::on_pushButton_5_clicked()
{
    ui->listWidget->insertItem(1, room);
    ui->listWidget_2->insertItem(1, roomNumber);

    ui->listWidget_3->insertItem(1, monday);
    ui->listWidget_3->insertItem(2, tuesday);
    ui->listWidget_3->insertItem(3, wednesday);
    ui->listWidget_3->insertItem(4, thursday);
    ui->listWidget_3->insertItem(5, friday);

    ui->listWidget_4->insertItem(1, mEndTime);
    ui->listWidget_4->insertItem(2, tEndTime);
    ui->listWidget_4->insertItem(3, wEndTime);
    ui->listWidget_4->insertItem(4, thEndTime);
    ui->listWidget_4->insertItem(5, fEndTime);


}
/*
 *  Check Box Widgets
 **/

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


/*
 *  Beginning and end time widgets for each day of the week
 *  first camel case indicates day of the week followed by start and end times
 **/
//assigns beginning time
void MainWindow::on_timeEdit_timeChanged(const QTime &time)
{
    mBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_2_timeChanged(const QTime &time)
{
    mEndTime = mBegTime + " - " + time.toString();
}
//assigns beginning time
void MainWindow::on_timeEdit_5_timeChanged(const QTime &time)
{
    tBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_6_timeChanged(const QTime &time)
{
    tEndTime = tBegTime + " - " + time.toString();
}
//assigns beginning time
void MainWindow::on_timeEdit_7_timeChanged(const QTime &time)
{
    wBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_8_timeChanged(const QTime &time)
{
    wEndTime = wBegTime + " - " + time.toString();
}
//assigns beginning time
void MainWindow::on_timeEdit_9_timeChanged(const QTime &time)
{
    thBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_10_timeChanged(const QTime &time)
{
    thEndTime = thBegTime + " - " + time.toString();
}
//assigns beginning time
void MainWindow::on_timeEdit_11_timeChanged(const QTime &time)
{
    fBegTime = time.toString();
}
//assigns ending time with beginning time to pass as the displayed time
void MainWindow::on_timeEdit_12_timeChanged(const QTime &time)
{
    fEndTime = fBegTime + " - " + time.toString();
}
