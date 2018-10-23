<html lang="en">
  <head>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   
    <style type="text/css">
            /* Space out content a bit */
      body {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
      }

      /* Everything but the jumbotron gets side spacing for mobile first views */
      .header,
      .marketing,
      .footer {
        padding-right: 1rem;
        padding-left: 1rem;
      }

      /* Custom page header */
      .header {
        padding-bottom: 1rem;
        border-bottom: .05rem solid #e5e5e5;
      }
      /* Make the masthead heading the same height as the navigation */
      .header h3 {
        margin-top: 0;
        margin-bottom: 0;
        line-height: 3rem;
      }

      /* Custom page footer */
      /* a tag */
      .marketing p a{
      	background-color: #B5CB05;
      }
      /* a tag */
      .footer {
        padding-top: 1.5rem;
        color: #777;
        border-top: .05rem solid #e5e5e5;
      }

      /* Customize container */
      @media (min-width: 48em) {
        .container {
          max-width: 46rem;
        }
      }
      .container-narrow > hr {
        margin: 2rem 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        text-align: center;
        border-bottom: .05rem solid #e5e5e5;
      }
      .jumbotron .btn {
        padding: .75rem 1.5rem;
        font-size: 1.5rem;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 3rem 0;
      }
      .marketing p + h4 {
        margin-top: 1.5rem;
      }

      /* Responsive: Portrait tablets and up */
      @media screen and (min-width: 48em) {
        /* Remove the padding we set earlier */
        .header,
        .marketing,
        .footer {
          padding-right: 0;
          padding-left: 0;
        }
        /* Space out the masthead */
        .header {
          margin-bottom: 2rem;
        }
        /* Remove the bottom border on the jumbotron for visual effect */
        .jumbotron {
          border-bottom: 0;
        }
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="header clearfix">        
        <h3 class="text-muted">MouthPiece</h3>
      </div>     

      <div class="row marketing">
        <p>Hi there,</p>   
        <p>You have an order.</p> 
        <p>Please login to your client area to view</p>       
        <h3></h3>
        <p>Thank you for choosing us</p>        
        <p>
          Best Regards
        </p>
        <p>
          MouthPiece Team
        </p>
      </div>

      <footer class="footer">
        <div class="col-lg-6">
          <div class="stay-connected-icons">
          <div class="stay-connected-content">
            <a href="{{ url('https://www.facebook.com/mouthpiece') }}">
              <span class="fui-facebook"></span>
            </a>
            <a href="{{ url('https://www.youtube.com/mouthpiece') }}">
                    <span class="fui-youtube"></span>
                  </a>
                  <a href="{{ url('https://www.instagram.com/mouthpiece') }}">
                    <span class="fui-instagram"></span>
                  </a>
                  <a href="{{ url('https://www.twitter.com/mouthpiece') }}">
                    <span class="fui-twitter"></span>           
                  </a>
          </div>          
        </div>
        </div>
        <div class="col-lg-6">&copy; 2017 MouthPiece.ng </div>       
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('public/js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
</html>
