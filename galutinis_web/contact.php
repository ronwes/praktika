<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="pic_icons/favico.ico">

     <title>LoL Statistics - Contact</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

   
    <link href="css/cover.css" rel="stylesheet">

    <script src="js/ie-emulation-modes-warning.js"></script>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   
      
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
            <h1 class="cover-heading">Contact us for any help or suggestions</h1>
            <div class="well well-lg text-info">
             <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <label for="name">Your name:</label><br />
                    <input id="name" class="input" name="name" type="text" value="" size="50" /><br />
                </div>
                <div class="row">
                    <label for="email">Your email:</label><br />
                    <input id="email" class="input" name="email" type="text" value="" size="50" /><br />
                </div>
                <div class="row">
                    <label for="message">Your message:</label><br />
                    <textarea id="message" class="input" name="message" rows="9" cols="50"></textarea><br />
                </div>
                <input id="submit_button" type="submit" value="Send email" />
            </form>						

 
          </div>

          <div class="mastfoot">
            <div class="inner">
               <p>System created by Artūras Kovaitis </p>
            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
