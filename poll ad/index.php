<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=yes">
        <link rel="stylesheet" href="style.css" />
	</head>

    <body>


		<div id="myAd">
				<form>
                    <lable id="btn_kelly" for="kelly">
                        <button type="button" id="kelly" name="vote" value="0">
                            <img class="pollbtn" src="img/kelly.jpg" />
                        </button>
                    </lable>    
                    
                    <lable id="btn_catterf" for="catterf">
                        <button type="button" id="catterf" name="vote" value="1">
                            <img class="pollbtn" src="img/cattf.jpg"  />
                        </button>
                    </lable>
                    
                    <lable id="btn_forst" for="forst">
                        <button type="button" id="forst" name="vote" value="3">
                            <img class="pollbtn" src="img/forst.jpg"  />
                        </button>
                    </lable>
                    
                    <lable id="btn_fanta" for="fanta">
                        <button type="button" id="fanta" name="vote" value="4">
                            <img class="pollbtn" src="img/fanta.jpg"  />
                        </button>
                    </lable>

				</form>
		</div>

        
<script>
//laed den aktuellen voting  stand in div results rein
function getVote(int) 
	{

    xmlhttp=new XMLHttpRequest();

  	xmlhttp.onreadystatechange=function() 
  		{
    	if (this.readyState==4 && this.status==200) 
    		{
      		document.getElementById("results").innerHTML=this.responseText;
    		}
  		}  
	xmlhttp.open("GET","poll.php?vote="+int,true);
	xmlhttp.send();
}

function vote(name)
	{
    var coach = name;
    console.log(coach);
//	getVote(document.getElementById('kelly').value);
	}



var btn_kelly = document.getElementById('kelly');
var btn_catterf = document.getElementById('catterf');
var btn_forst = document.getElementById('forst');
var btn_fanta = document.getElementById('fanta');

kelly.addEventListener("click", vote('kelly'));
catterf.addEventListener("click", vote('catterf'));
forst.addEventListener("click", vote('forst'));
fanta.addEventListener("click", vote('fanta'));
    
</script>
        
        
    </body>
</html>