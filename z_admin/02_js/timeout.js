$(function()
{

     function timeChecker()
     {
     	setInterval(function()
          {
     		var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
     	    console.log(storedTimeStamp);


     		},3000);
     }


     function timeCompare(timeString)
     {

     	var currentTime = new Date();
     	var pastTime    = new Date (timeString);
     	var timeDiff    = currentTime - pastTime;
     	var minPast     = Math.floor( (timeDiff/60000) );

     	   if (minPast > 1)  // mas de un minuto
     	   {
                sessionStorage.removeItem("lastTimeStamp");
                window.location ="../killer.php";
                return false;
     	   }
     	   else 
     	   {
         console.log(currentTime +" - "+pastTime+" - "+minPast+" min past");

     	   }
     }




	$(document).mousemove(function()
	{
         var timeStamp = new Date();
         sessionStorage.setItem("lastTimeStamp",timeStamp);
	});

	timeChecker();
		
		
});