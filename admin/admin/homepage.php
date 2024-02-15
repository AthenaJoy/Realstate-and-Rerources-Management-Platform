<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "home.css">
  <title> Home </title>

</head>
<body>

<nav> 
  <a href="#" class="active">Home</a>
  <a href="">About</a>
  <a href="propertylist.php"> Property List</a>
  <a href="#"> Resources List</a>
  
</nav>
   
  <div class="container">
       <div class="section1">
                        <div class="pic">
                                <img src="../img/1.avif "  alt="Description of the image">
                                <p> For Sale House</p> <a href="Ratings">Rates: ****</a>
                                <p>Location: Manila Province</p>
                                <p>Contacts</p>

                                <script>
                                  function submitComment() {
                                    // Get the value of the comment input
                                    var comment = document.getElementById('comment').value;

                                            // Validate the comment (for example, check if it's not empty)
                                              if (comment.trim() === '') {
                                                alert('Please enter a comment.');
                                                 return;
                                               }

                                            // Simulate submission (replace this with your actual submission logic)
                                    alert('Comment submitted: ' + comment);
                                    }
                                </script>
                                <textarea id="comment" rows="2" cols="30" placeholder=" Comment here..."></textarea>
                                <button onclick="submitComment()">Submit</button>
                                
                        </div>

                       
                     
       </div>

       <div class="section2">

               

                      

                </div>
  </div>


</body>
</html>
