#ifndef MAINWINDOW_H
#define MAINWINDOW_H
#include <QMainWindow>
#include <QTime>
#include <QString>
#include <string.h>

using namespace std;
namespace Ui {
class MainWindow;
}

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    explicit MainWindow(QWidget *parent = 0);
    ~MainWindow();

    QString room;
    QString roomNumber;

    //Day Variables
    QString monday = "Monday";
    QString tuesday = "Tuesday";
    QString wednesday = "Wednesday";
    QString thursday = "Thursday";
    QString friday = "Friday";
    QString saturday = "Saturday";
    QString sunday = "Sunday";

    //Time Variables
    QString mBegTime;
    QString mEndTime = "N/A";
    QString tBegTime;
    QString tEndTime = "N/A";
    QString wBegTime;
    QString wEndTime = "N/A";
    QString thBegTime;
    QString thEndTime = "N/A";
    QString fBegTime;
    QString fEndTime = "N/A";
    QString sBegTime;
    QString sEndTime = "N/A";
    QString suBegTime;
    QString suEndTime = "N/A";


private slots:


    void on_lineEdit_textChanged(const QString &arg1);

    void on_pushButton_5_clicked();

    void on_lineEdit_2_textChanged(const QString &arg1);

    void on_checkBox_clicked();

    void on_checkBox_2_clicked();

    void on_checkBox_3_clicked();

    void on_checkBox_4_clicked();

    void on_timeEdit_timeChanged(const QTime &time);

    void on_timeEdit_2_timeChanged(const QTime &time);

    void on_timeEdit_5_timeChanged(const QTime &time);

    void on_timeEdit_6_timeChanged(const QTime &time);

    void on_timeEdit_7_timeChanged(const QTime &time);

    void on_timeEdit_8_timeChanged(const QTime &time);

    void on_timeEdit_9_timeChanged(const QTime &time);

    void on_timeEdit_10_timeChanged(const QTime &time);

    void on_checkBox_5_clicked();

    void on_timeEdit_11_timeChanged(const QTime &time);

    void on_timeEdit_12_timeChanged(const QTime &time);

    void on_checkBox_6_clicked();

    void on_checkBox_7_clicked();

    void on_timeEdit_13_timeChanged(const QTime &time);

    void on_timeEdit_14_timeChanged(const QTime &time);

    void on_timeEdit_15_timeChanged(const QTime &time);

    void on_timeEdit_16_timeChanged(const QTime &time);



    void on_pushButton_6_clicked();



private:
    Ui::MainWindow *ui;

};

#endif // MAINWINDOW_H
