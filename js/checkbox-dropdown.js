var count = 2;
var countTwo = 2;
var countThree = 2;
var countFour = 2;
var countFive = 2;
var countSix = 2;
var countSeven = 2;

function showCheckbox()
{
    if (count % 2 == 0)
    {
        $('#monTime').show();
        $('#monTime-2').show();
        $('#to').show();
    }
    else
    {
        $('#monTime').hide();
        $('#monTime-2').hide();
        $('#to').hide();
    }
    
    count++;
}



function showCheckboxTwo()
{
     if (countTwo % 2 == 0)
    {
        $('#tuesTime').show();
        $('#tuesTime-2').show();
        $('#to-2').show();
    }
    
     else
    {
        $('#tuesTime').hide();
        $('#tuesTime-2').hide();
        $('#to-2').hide();
    }
    countTwo++;
}

function showCheckboxThree()
{
     if (countThree % 2 == 0)
    {
        $('#wedTime').show();
        $('#wedTime-2').show();
        $('#to-3').show();
    }
    
     else
    {
        $('#wedTime').hide();
        $('#wedTime-2').hide();
        $('#to-3').hide();
    }
    countThree++;
}

function showCheckboxFour()
{
     if (countFour % 2 == 0)
    {
        $('#thursTime').show();
        $('#thursTime-2').show();
        $('#to-4').show();
    }
    
     else
    {
        $('#thursTime').hide();
        $('#thursTime-2').hide();
        $('#to-4').hide();
    }
    countFour++;
}

function showCheckboxFive()
{
     if (countFive % 2 == 0)
    {
        $('#friTime').show();
        $('#friTime-2').show();
        $('#to-5').show();
    }
    
     else
    {
        $('#friTime').hide();
        $('#friTime-2').hide();
        $('#to-5').hide();
    }
    countFive++;
}

function showCheckboxSix()
{
     if (countSix % 2 == 0)
    {
        $('#satTime').show();
        $('#satTime-2').show();
        $('#to-6').show();
    }
    
     else
    {
        $('#satTime').hide();
        $('#satTime-2').hide();
        $('#to-6').hide();
    }
    countSix++;
}

function showCheckboxSeven()
{
     if (countSeven % 2 == 0)
    {
        $('#sunTime').show();
        $('#sunTime-2').show();
        $('#to-7').show();
    }
    
     else
    {
        $('#sunTime').hide();
        $('#sunTime-2').hide();
        $('#to-7').hide();
    }
    countSeven++;
}