
	function allowDrop(ev) {
        ev.preventDefault();
    }
    
    function drag(ev) {
      ev.dataTransfer.setData("text", ev.target.id);
    }
    
    function drop(ev) {
        ev.preventDefault();
        var numberID = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(numberID));
      
        var divID = ev.target.id;
    
        checkSum(numberID, divID);
      
    }
    
    /**************************************************************/
    
    var sumRow1 = 1;
    var sumRow2 = 13;
    var sumRow3 = 0;
    var sumRow4 = 18;
    var sumCol1 = 14;
    var sumCol2 = 9;
    var sumCol3 = 0;
    var sumCol4 = 9;
    var sumDiag1 = 17;
    var sumDiag2 = 11;
    
    var divValue = [ 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ];
    
    function checkSum(numberID, divID)
    {
      // numberID -- which number been dropped somewhere
      // divID - where that number somewhere is
      
      var number = getNumID(numberID);
      var div = getDivID(divID);
      
      for(var i=0;i<11;i++)
        {
          if( divValue[i] == number ) 
          {
            divValue[i] = 0;
            if( i!=div ) 
              {
                if(i==0) {sumRow1 -= number; sumCol1 -= number; sumDiag1 -= number; }
                else if (i==1) {sumRow1 -= number; sumCol2 -= number; }
                else if(i==2) {sumRow1 -= number; sumCol3 -= number; }
                else if(i==3) {sumRow2 -= number; sumCol3 -= number; sumDiag2 -= number}
                else if(i==4) {sumRow2 -= number; sumCol4 -= number; }
                else if(i==5) { sumRow3 -= number; sumCol1 -= number; }
                else if(i==6) { sumRow3 -= number; sumCol2 -= number; sumDiag2 -= number; }
                else if(i==7) { sumRow3 -= number; sumCol3 -= number; sumDiag1 -= number; }
                else if(i==8) { sumRow3 -= number; sumCol4 -= number; }
                else if(i==9) { sumRow4 -= number; sumCol2 -= number; }
                else if(i==10) { sumRow4 -= number; sumCol3 -= number; }
              }
            else break;
          }
        }
    
      if(divID=="div-1") 
        {
          sumRow1 += number;
          sumCol1 += number;
          sumDiag1 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-2") 
        {
          sumRow1 += number;
          sumCol2 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-3") 
        {
          sumRow1 += number;
          sumCol3 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-7") 
        {
          sumRow2 += number;
          sumCol3 += number;
          sumDiag2 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-8") 
        {
          sumRow2 += number;
          sumCol4 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-9") 
        {
          sumRow3 += number;
          sumCol1 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-10") 
        {
          sumRow3 += number;
          sumCol2 += number;
          sumDiag2 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-11") 
        {
          sumRow3 += number;
          sumCol3 += number;
          sumDiag1 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-12") 
        {
          sumRow3 += number;
          sumCol4 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-14") 
        {
          sumRow4 += number;
          sumCol2 += number;
          divValue[div] = number;
        }
      
      if(divID=="div-15") 
        {
          sumRow4 += number;
          sumCol3 += number;
          divValue[div] = number;
        }
      
      document.getElementById("sum-diag-1").innerHTML = sumDiag1;
        if(sumDiag1==34) document.getElementById("sum-diag-1").style.background = "green";
        else document.getElementById("sum-diag-1").style.background = "red";
      document.getElementById("sum-col-1").innerHTML = sumCol1;
        if(sumCol1==34) document.getElementById("sum-col-1").style.background = "green";
        else document.getElementById("sum-col-1").style.background = "red";
      document.getElementById("sum-col-2").innerHTML = sumCol2;
        if(sumCol2==34) document.getElementById("sum-col-2").style.background = "green";
        else document.getElementById("sum-col-2").style.background = "red";
      document.getElementById("sum-col-3").innerHTML = sumCol3;
        if(sumCol3==34) document.getElementById("sum-col-3").style.background = "green";
        else document.getElementById("sum-col-3").style.background = "red";
      document.getElementById("sum-col-4").innerHTML = sumCol4;
        if(sumCol4==34) document.getElementById("sum-col-4").style.background = "green";
        else document.getElementById("sum-col-4").style.background = "red";
      document.getElementById("sum-diag-2").innerHTML = sumDiag2;
        if(sumDiag2==34) document.getElementById("sum-diag-2").style.background = "green";
        else document.getElementById("sum-diag-2").style.background = "red";
      document.getElementById("sum-row-1").innerHTML = sumRow1;
        if(sumRow1==34) document.getElementById("sum-row-1").style.background = "green";
        else document.getElementById("sum-row-1").style.background = "red";
      document.getElementById("sum-row-2").innerHTML = sumRow2;
        if(sumRow2==34) document.getElementById("sum-row-2").style.background = "green";
        else document.getElementById("sum-row-2").style.background = "red";
      document.getElementById("sum-row-3").innerHTML = sumRow3;
        if(sumRow3==34) document.getElementById("sum-row-3").style.background = "green";
        else document.getElementById("sum-row-3").style.background = "red";
      document.getElementById("sum-row-4").innerHTML = sumRow4;
        if(sumRow4==34) document.getElementById("sum-row-4").style.background = "green";
        else document.getElementById("sum-row-4").style.background = "red";
      
    }
    
    function getNumID(numID)
    {
      var number;
        
      switch(numID) {
        case "number-1":
            number = 2;
            break;
        case "number-2":
            number = 3;
            break;
        case "number-3":
            number = 5;
            break;
        case "number-4":
            number = 6;
            break;
        case "number-5":
            number = 7;
            break;
        case "number-6":
            number = 11;
            break;
        case "number-7":
            number = 12;
            break;
        case "number-8":
            number = 13;
            break;
        case "number-9":
            number = 14;
            break;
        case "number-10":
            number = 15;
            break;
        case "number-11":
            number = 16;
            break;
        default:
            number = -100;
    }
      
      return number;
    }
    
    
    function getDivID(divID)
    {
      var div;
        
      switch(divID) {
        case "div-1":
            div = 0;
            break;
        case "div-2":
            div = 1;
            break;
        case "div-3":
            div = 2;
            break;
        case "div-7":
            div = 3;
            break;
        case "div-8":
            div = 4;
            break;
        case "div-9":
            div = 5;
            break;
        case "div-10":
            div = 6;
            break;
        case "div-11":
            div = 7;
            break;
        case "div-12":
            div = 8;
            break;
        case "div-14":
            div = 9;
            break;
        case "div-15":
            div = 10;
            break;
        default:
            div = -100;
    }
      
      return div;
    }