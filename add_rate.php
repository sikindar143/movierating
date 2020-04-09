<html>
<style>
body {
  background-image: url('bg2.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body>

<h1 style="margin-left:500px;margin-top: 30px;color:red;"> <b>MOVIE RATING:</b></h1><br>
<div class="container" style="margin-left:500px;">
<div class="row">
<form action="add_rate.php" method="post">
<div>
  <br>
</div>

<br>
<br>
<div>
<label><b style="color:white;">Name: </b> </label>
<input type="text" name="name">
</div>
<br>
<div class="rateyo" id="rating"
data-rateyo-rating="4"
data-rateyo-num-stars="5"
data-rateyo-score="3">
</div>

<span style="color:white;"class='result'>0</span>
<input type="hidden" name="rating">


<div style="margin-top:5px;"><input type="submit" name="add"></div>
</form>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


<script>

$(function() {
$(".rateyo").rateYo().on("rateyo.change", function(e,data) {
  var rating=data.rating;
  $(this).parent().find('.score').text('score :'+$(this).attr('data-rateyo-score'));
  $(this).parent().find('.result').text('rating :'+rating);
  $(this).parent().find('input[name=rating]').val(rating);

});
});

</script>

<p style="color:red;margin-left:-15px;">
<?php
require 'db_connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $name=$_POST["name"];
  $rating=$_POST["rating"];

  $sql="INSERT INTO ratee (name,rate) VALUES ('$name','$rating')";
  if(mysqli_query($conn,$sql))
  {
    echo "saved successfully";
  }
  else
  {
    echo "Error: ".$sql. "<br>".mysqli_error($conn);
  }
  mysqli_close($conn);

}
?>
</div>
</body>

</html>
