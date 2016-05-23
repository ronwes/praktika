<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="pic_icons/favico.ico">

  <title>LoL Statistics - Home</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

 
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">


  <link href="css/cover.css" rel="stylesheet">

  <script src="js/ie-emulation-modes-warning.js"></script>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="dist/Chart.js"></script>


  <style>
  #jumbLogo {

    height: 30px;
    width: 50px;
  }

  #textLogo {

    height: 64px;
    width: 64px;
    text-align: center;
  }

  </style>
</head>

<body>
            <?php            

            function getSummoner($summoner, $server) {
              $summoner_lower = mb_strtolower($summoner, 'UTF-8');
              $summoner_nospaces = str_replace(' ', '', $summoner_lower);
              if(false == (@file_get_contents("https://$server.api.pvp.net/api/lol/$server/v1.4/summoner/by-name/$summoner_nospaces?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3"))){
                return false;
              }else{
                $sum = file_get_contents("https://$server.api.pvp.net/api/lol/$server/v1.4/summoner/by-name/$summoner_nospaces?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3");
                $sum = json_decode($sum, true);
                return $sum[$summoner_nospaces];
              }

            }

    function getMatchlist($id, $server) {
         $server = mb_strtolower($server, 'UTF-8');
		  if((@file_get_contents("https://$server.api.pvp.net/api/lol/$server/v2.2/matchlist/by-summoner/$id?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3")) == false){
                return false;
              }else{
         $ml = file_get_contents("https://$server.api.pvp.net/api/lol/$server/v2.2/matchlist/by-summoner/$id?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3"); 
         $ml = json_decode($ml, true);
    return $ml;
	
			  }

}

    function getMatch($id, $server) {
         $server = mb_strtolower($server, 'UTF-8');
		 
		  if(false == (@file_get_contents("https://$server.api.pvp.net/api/lol/$server/v2.2/match/$id?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3"))){
                return false;
              }else{
               $match = file_get_contents("https://$server.api.pvp.net/api/lol/$server/v2.2/match/$id?api_key=86d3f3b5-4c03-41d7-8757-84765a1d1cf3"); 
			   $match = json_decode($match, true);
    return $match;

			  }

}
            

            ?>
			



  <div class="site-wrapper">

    <div class="site-wrapper-inner">

      <div class="cover-container">

        <div class="masthead clearfix">
          <div class="inner">
            <h3 class="masthead-brand"><img src="pic_icons/LoL_Icon.png" id="jumbLogo" alt="header">oL Statistics</h3>
            <nav>
              <ul class="nav masthead-nav">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="inner cover">
          <h1 class="cover-heading">League of Legends players stats</h1>


          <div class="well well-lg text-info">


			            <?php

            if(isset($_POST['ok'])){
              $summoner = $_POST['summoner'];
              $server = $_POST['server'];
              if(getSummoner($summoner, $server) != false){
                  

  
			  
			  
			  
			     $summoner_info = getSummoner($summoner, $server);
				
				
				$summoneris = mb_strtolower($summoner, 'UTF-8');
				$summoneris_n = str_replace(' ', '', $summoneris);
			  
			   $id = $summoner_info["id"];
			
				 
				$matchL_info = getMatchlist($id, $server);
				
				
				
				$matchesIds = array();
			

				for ($i = 0; $i < 4;$i++){
					$matchesIds[$i] = $matchL_info["matches"]["$i"]["matchId"];

				}	
                $mID = $matchL_info['matches']['0']['matchId'];
                  
                $match_info = getMatch($mID, $server);  
				
				
					
					
				
				
				//elemento nr radimas, su tinkamu vartotoju
				$participantID = 0;
				for($i = 0; $i < 10;$i++){
					
				$summoneris2 = mb_strtolower($match_info['participantIdentities'][$i]['player']['summonerName'], 'UTF-8');
				$summoneris_m = str_replace(' ', '', $summoneris2);  
					
					if($summoneris_m == $summoneris_n){
						$participantID = $i;
						
					}
					
					
				}
                    

				
				$goldEarned = array();
				foreach ($matchesIds as $key=>$value){
					$goldEarned[$key] = getMatch($value, $server)['participants'][$participantID]['stats']['goldEarned'];
					
					
					
				}
				
				
				
				
				print_r($matchesIds);
				
									
                      
		
                                  
                  
                  
               	echo " <div style='width: 350' heigth='350'>
					   <canvas id='mycanvas'></canvas> </div>";
                 
				
              }else{
                print("Error: Wrong summoner name/region/no ranked match history ");
                echo "<br> <a class='text-danger' href='index.php'>Back to main page</a>";  
              }
            }else{    

              ?>

            <h3>Check your <img src="pic_icons/LoL.png" id="textLogo" alt="Paveiksliukas"> game statistics and results</h3>

        

        
              <form action="" method="POST">        
                <div class="form-inline">
                  <div class="form-group">
                    <label class="sr-only" for="summonerInput" id="summ">Summoner name</label>
                    <input class="form-control input-lg" type="text" placeholder="Summoner name" name="summoner">
                  </div>          
                  <label> Region:

                    <select name="server" class="form-control input-lg">
                      <option value="NA">NA</option>
                      <option value="EUW">EUW</option>
                      <option value="EUNE">EUNE</option>
                      <option value="KR">KR</option>
                      <option value="TR">TR</option>
                      <option value="RU">RU</option>
                      <option value="LAN">LAN</option>
                      <option value="LAS">LAS</option>
                      <option value="BR">BR</option>
                      <option value="OCE">OCE</option>    
                    </select>

                  </label>
                  <input type="submit" class="btn btn-success btn-lg" value="Go!" name="ok">    

                </div>  
                <label style="text-align:right">
                  <input type="checkbox" checked="checked">
                  Remember me
                </label>          
              </form> 
              <?php } ?>           

            </div>

            <div class="mastfoot">
              <div class="inner">

                <p>System created by Artūras Kovaitis </p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </div>   
    
       <!-- Chart.js script -->
    <script>
			
			var chrt = document.getElementById("mycanvas").getContext("2d");
			var data = {
				labels: ["1", "2", "3", "4"], //x-axis
				datasets: [
					{
						label: "Paskutinių 4 žaidimų gold earned grafikai", //optional
						backgroundColor: "rgba(1,217,25,0.5)",
						data:  <?=json_encode($goldEarned)?>// y-axis
					
					}
				]
			};
			console.log(data);
			 window.myBar = new Chart(chrt, {
			    type: 'bar',
                data: data,
                options: {
                    title:{
                        display:true,
                        text:"Player statistics: "
                    },
                    tooltips: {
                        mode: 'label'
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
			 
			 
			 });
            
			
            
		</script>
		
		<?php 
		unset($goldEarned); 
		unset($matchesIds);
		unset($summoner_info);
		unset($matchL_info);
		unset($match_info);
		
		
		
		?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>