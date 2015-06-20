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
        $('#stepExample1').show();
        
    }
    else
    {
        $('#stepExample1').hide();
       
    }
    
    count++;
}



function showCheckboxTwo()
{
     if (countTwo % 2 == 0)
    {
        $('#stepExample3').show();
        
    }
    
     else
    {
        $('#stepExample3').hide();
       
    }
    countTwo++;
}

function showCheckboxThree()
{
     if (countThree % 2 == 0)
    {
        $('#stepExample5').show();
        
    }
    
     else
    {
        $('#wstepExample5').hide();
    
    }
    countThree++;
}

function showCheckboxFour()
{
     if (countFour % 2 == 0)
    {
        $('#stepExample7').show();
       
    }
    
     else
    {
        $('#stepExample7').hide();
    
    }
    countFour++;
}

function showCheckboxFive()
{
     if (countFive % 2 == 0)
    {
        $('#stepExample9').show();
       
    }
    
     else
    {
        $('#stepExample9').hide();
       
    }
    countFive++;
}

function showCheckboxSix()
{
     if (countSix % 2 == 0)
    {
        $('#stepExample11').show();
       
    }
    
     else
    {
        $('#stepExample11').hide();
      
    }
    countSix++;
}

function showCheckboxSeven()
{
     if (countSeven % 2 == 0)
    {
        $('#stepExample13').show();
    
    }
    
     else
    {
        $('#stepExample13').hide();
     
    }
    countSeven++;
}