<?php
session_start();
include("header.php");


$con=new connec();
$tbl="slider";
$result=$con->select_all($tbl);
$result1=$con->select_all($tbl);

if(!empty($_SESSION["username"]))
{
    ?>

<script>
  $(document).ready(function(){
    $(#modelId1).modal('show');
  });
</script>
   <?php

}
?>


<section style="min-height:450px;"> 


<div id="carouselId" class="carousel slide" data-ride="carousel">
    <?php
         if($result->num_rows>0)
         {
            $i=0;
            echo'<ol class="carousel-indicators">';
            while($row=$result->fetch_assoc())
            {
                if($i==0)
                {
                    echo'<li data-target="#carouselId" data-slide-to="'.$i.'" class="active"></li>';

                }
                else
                {
                    echo'<li data-target="#carouselId" data-slide-to="'.$i.'"></li>';
                }
                $i++;

            }
            echo'</ol>';
         }
    ?>
    <!-- <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
        <li data-target="#carouselId" data-slide-to="3"></li>
        <li data-target="#carouselId" data-slide-to="4"></li>
    </ol> -->
    <div class="carousel-inner" role="listbox">
        <?php 
        if($result1->num_rows>0)
        {
            $j=0;
            while($row1=$result1->fetch_assoc())
            {
                if($j==0)
                {
                    ?>
                     <div class="carousel-item active">
                       <img src="<?php echo $row1["img_path"] ?>" alt="<?php $row1["alt"]; ?>" style="Width:100%;height:500px;">
                    </div>

                    <?php
                }
                else
                {
                    ?>
                    <div class="carousel-item">
                       <img src="<?php echo $row1["img_path"] ?>" alt="<?php $row1["alt"]; ?>" style="Width:100%;height:500px;">
                    </div>

                    <?php

                }
                $j++;
            }
        }
        ?>
    <!--
         <div class="carousel-item active">
            <img src="images/banner4.jpg" alt="First slide" style="Width:100%;height:500px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner5.jpg" alt="Second slide" style="Width:100%;height:500px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner1.jpg" alt="Third slide" style="Width:100%;height:500px;">
        </div>
        <div class="carousel-item">
            <img src="images/boom.jpg" alt="Fourth slide" style="Width:100%;height:500px;">
        </div>
        <div class="carousel-item">
            <img src="images/banner3.jpg" alt="Fifth slide" style="Width:100%;height:500px;">
        </div>
     -->
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


</section>





<?php
include("footer.php");
?>