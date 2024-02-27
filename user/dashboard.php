<?php
   include("../includes/footer.php")

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
    <link rel = "stylesheet" href = "dashboard.css">
    <link rel = "stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
      <div class="header">
            <div class="logo">

                <img src="../img/pic2.jpg" alt="">
              
                
            </div>

                    <div class="textTitle">
                        <h4>Real State and Resources Management Platform</h4>
                    </div>

                    <a href = "../index.php" id = "logout">
                                <div class="logoutBtn">
                                    
                                    
                                        <h5>LOGOUT</h5>
                                    
                                </div>
                    </a>    
      </div>
      <div class="main">

          <!-- <div class="section1"> 
                
                    <div class="box">
                        <a href = "">
                                <div class="title"> 
                                    Home
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-house" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                                    </svg>
                                </div>
                                
                        </a>
                    </div> -->
                    <div class="section2">

                    <div class="box">
                            <a href="property_user.php">
                                <div class="title">
                                  Property list
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="rgb(114, 111, 111)" class="bi bi-shop" viewBox="0 0 16 16">
                                    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
                                    </svg>
                                </div>
                                
                                </a>
                    </div>
                    
          
         
            
                    <div class="box">
                        <a href="resources_user.php">
                                <div class="title">
                                    Resources File list
                                </div>
                                <div class="logo">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="rgb(114,111,111)" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h7v1a1 1 0 0 1-1 1zm7-3H6v-2h7z"/>
                                  </svg>
                                </div>
                                
                        </a>
                    </div>

                  <!--  <div class="box">
                        <a href="agent.php">
                                 <div class="title">
                                    Agent
                                </div>
                                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="rgb(114, 111, 111)" class="bi bi-file-person-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11"/>
                                    </svg>
                                </div>
-->
                               
                        </a>
                    </div>
          </div>

      </div>    
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>