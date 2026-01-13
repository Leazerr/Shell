<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php  include('include/header.php'); ?>

<?php
if (isset($_POST["submit"])) {
$name = str_replace("'","\'",$_POST["name"]);
$email = str_replace("'","\'",$_POST["email"]);
$phone = str_replace("'","\'",$_POST["phone"]);
$subjects = str_replace("'","\'",$_POST["subjects"]);
$date = date('d-m-Y h:i:s a');
$sql = "INSERT INTO `contact`(`name`, `email`, `phone`, `subjects`, `creatdate`, `update_date`) VALUES ('$name','$email','$phone','$subjects','$date','$date')";

$inertcont =  $conn->query($sql);

if($inertcont==true){ ?>
<script>
setTimeout(function() {
swal({
title: "Successfully Submitted",
text: "Thanks!",
type: "success"
}).then(function() {
window.location.href = 'index.php';
});
}, 1000);
</script>
<?php
}
}	
?>

<?php
$sql = "SELECT * FROM tbl_pages WHERE id='1'";
$aboutquery = $conn->query($sql)->fetch_assoc();
?>      

<div id="sliderhome" class="carousel slide slidermargin" data-ride="carousel">
<div class="carousel-inner">
<?php $i = 1;
$slidera = $conn->query("SELECT * FROM `tbl_slider`");
foreach ($slidera as $slider): ?>
<?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
<div class="<?php echo $item_class; ?>">        
<img src="admin/uploads/sliderimg/<?php echo $slider['image'];?>" alt="Los Angeles" style="width:100%;">
</div>
<?php $i++; ?>
<?php endforeach;?>
</div>
<a class="left carousel-control" href="#sliderhome" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#sliderhome" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>


<!--Start rev aboutus wrapper-->
<div class="contentPadding about-sec">
<div class="container">
<div class="row verAlign">
<div class="col-xs-12 col-sm-5 col-md-4">
<!-- 	Pesrone image-START 	-->
<div class=" personeImg">
<img src="admin/upload/<?php echo $aboutquery['image'];?>" class="imgWrapper1 " width="100%" alt="" style="">    

</div>
<!-- 	Pesrone image-END 	-->
</div>
<div class="col-xs-12 col-sm-7 md-7 col-md-offset-1">
<!-- 	Pesone content-START 	-->
<div class="personeContent normall">
<div class="titleShortcode responsive_title has-line is-inline">
<h4 class="h4 as mt-0"><?php echo $aboutquery['wname']; ?></h4>
</div>
<!--<div class="emptySpace30"></div>-->
<div class="simple-article normall">

<?php echo substr($aboutquery['content'], 0, 1100) .((strlen($aboutquery['content']) > 1100) ? '...' : ''); ?> 
</div>
<!--<div class="emptySpace30"></div> -->   	
<p class="read_position">
<a href="about_us.php" class="button read_btn btnStyle3 btnSize2 btnbtn-about">About Us</a>
</p>

</div>
<!-- 	Pesone content-END 	-->
</div>
</div>
</div>
</div>
<!--End rev aboutus wrapper-->


<!-- 	Offer-START 	-->
<div class="contentPadding">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="titleShortcode has-line is-inline smallMb normall">
<h4 class="h4 as text-center">Areas of Expertise</h4>
</div>
</div>
</div>

<div class=" row">


<style>
.colmservice{
padding: 20px;
text-align: center;
border: solid 1px #ccc;
border-radius: 10px;
box-shadow: inset 0px -1px 0px 0px;
margin-bottom:20px;
}
.colmservice a img{
width:100%;
}


</style>    

<?php
$faqselect = "SELECT * FROM services WHERE status='1'";
$faqdata =  $conn->query($faqselect);
foreach($faqdata as $services){ ?>
<div class="col-md-4 col-xs-6">
<div class="colmservice">
<a href="" class="">
<img src="admin/uploads/services/<?=$services["image"]?>" alt="">
</a>
<h4 class=""><?=$services["title"]?></h4>
<p><a href="service_detail.php?id=<?=base64_encode($services['id'])?>" class="button read_btn btnStyle3 btnSize2 btnbtn-about">Read More</a></p>
</div>
</div>
<?php } ?>    

</div>

</div>
</div>
<!-- 	Offer-END 	-->

<!-- 	Why choose us-START 	-->
<div class="contentPadding about-sec textfontftext">
<div class="container">
<div class="row">
<div class="col-12">
<h4 class="h4 as text-center text-white spacing">Why Therapy/Counselling?</h4>
</div>
<div class="col-md-4">
<div class="chooseTitle large">

<h5 class="text-white" style="color:white !important">Therapy is considered taboo</h5>
</div>

<div class="normall text-white">
<p class="text-white"  style="color:white !important">Shan says that many of us need therapy, but only a few go for it, and they are often secretive about it. She shares that she has had therapy herself, which did wonders for her. It is a game changer, and it can do wonders for everyone.</p>

<p class="text-white"  style="color:white !important">We very quickly talk about our physical ailments. We don’t shy away from seeing a doctor even if our leg hurts for more than two days. But we continue to suffer in silence and hide it when our hearts break or our relationships hurt and break. Why can't we boldly seek help, then?  WHO states that health is not just physical but mental and emotional. </p>
</div>


</div>
<div class="col-md-8">

<h5 class="text-white"  style="color:white !important">Anybody who is: </h5>
<div class="simple-article normall article_content">

<div class="row">
<div class="col-sm-6">
<ul class="text-white">
<li>struggling in their marriage</li>
<li>married for many years, but love and fondness are missing</li>
<li>wanting to make their marriage better</li>
<li>going through a nasty and painful relationship</li>
<li>struggling with parenting their child</li>
<li> wanting to learn better parenting strategies</li>
<li>just looking for answers</li>
<li>stuck in career</li>
<li>hurting and sad</li>
</ul>
</div>
<div class="col-sm-6">
<ul class="text-white">
<li>wanting  a better understanding of themselves</li>
<li> unable to handle their emotions (like anger, frustration, bitterness)</li>
<li>emotionally hurting</li>
<li>wanting to be emotionally intelligent</li>
<li>suffered a setback/loss in life </li>
<li>stuck in life and looking for  personal growth</li>
<li>planning to get married and wants to know what makes a loving bond</li>
<li>feeling low</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- 	Why choose us-END 	-->



<!-- 	Video START 	-->
<div class="container mb-3 video-section">
<div class="row">
<div class="col-12">
<div class="hyper has-line is-inline">
<h4 class="mb-2 text-center"> Videos</h4>
</div>  

<div class="swiperMainWrapper">
<div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-slides-per-view="2" data-space="30">
<div class="swiper-wrapper">

<?php
$faqselect = "SELECT * FROM gallery_video  WHERE status='1'";
$faqdata =  $conn->query($faqselect);
foreach($faqdata as $videos){ ?>  
<!--    Slide4-START    -->
<div class="swiper-slide"> 
<div class="clientSayWrapper" >
<div class="sayPersone">
<iframe  width="100%" style="height:300px" src="https://www.youtube.com/embed/<?=$videos["video_Url"]?>" class="w-100"></iframe>
<div class="text-center">
<h5 class=""><?php echo $videos['title'] ; ?></h5>
</div>
</div>
</div>
</div>
<?php } ?>
<!--    Slide4-END  -->
</div>
<div class="swiper-pagination relative-pagination mt-3"></div>
</div>
</div>

</div>
</div>
</div>
<!-- 	Video END 	-->

<!-- 	Client says-START 	-->
<div class="contentPadding bgOverlay about-sec" >
<div class="container">
<div class="titleShortcode has-line is-inline mb-3">
<h4 class="text-center py-3">Testimonials</h4>
</div>
<div class="row">
<div class="col-xs-12">
<!--    Swiper-START    -->
<div class="swiperMainWrapper">
<div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-slides-per-view="2" data-space="30">
<div class="swiper-wrapper client_say_content">
<!--    Slide1-START    -->
<?php 
$select = $conn->query("SELECT * FROM tbl_testmonial WHERE status= '1' ");
foreach($select as $selectdata) { ?>
<div class="swiper-slide"> 
<div class="clientSayWrapper">
<div class="clientSay">
<i class="fa fa-quote-left"></i>
<div class="simple-article normall con client_say_text">
<p ><?php echo $selectdata['content']; ?></p>
</div>

<div class="sayPersone mt-3 mb-3">
<img   src="admin/uploads/<?php echo $selectdata['image']; ?>" alt="" class="testimonial-img">
<div class="personeInfo">
<p><?php echo $selectdata['fname']; ?></p>
</div>
</div>

</div>

</div>
</div>
<?php
} 
?>
<!--    Slide1-END  -->
</div>
<!--    Swiper poiner pagination-START  -->
<div class="swiper-pagination relative-pagination"></div>
<!--    Swiper poiner pagination-END    -->
</div>
</div>
<!--    Swiper-END  -->
</div>
</div>
</div>
</div>
<!-- 	Client says-END 	-->

<!--  	Request service-START 	-->
<div class="contentPadding">
<div class="container">
<div class="col-12">

<h4 class="text-center py-3 as">Frequently Heard Lines</h4>
</div>
<div class="row align-items-center ">

<div class="col-md-12">
<div class="fhl_line text-center">
<p>"We  have tried talking, reasoning, explaining  and even bribing, yet they do not listen to us."</p>    
<p>“We  knew parenting was not easy, but no one told us it is this difficult.”</p>    
<p>“We love them, care for them and want the best for them. Then why don't they understand this?” </p>    
<p>“Parenting is so overwhelming, and I feel so hopeless and powerless. Who said it was fun?”</p>    
<p>"All that yelling and defiance and temper tantrums. “ I feel so powerless and heartbroken.”</p>    
<p>"I feel like a fool, absolutely clueless about how to deal with my child.”</p>    
<p>"I know we shouldn't yell or spank a child, but I never expected to get triggered like this.”</p>      
</div>     
</div>

<!-- 
<div class="col-md-3 px-0" style="margin: 0px 0px 0px 0px;">

<img src="img/lineimg/line_img1.png" class="w-100" style="height:191px;width:100%">

</div>
<div class="col-md-3 px-0" style="margin: 83px 0px 0px 0px;">

<img src="img/lineimg/line_img2.png" class="w-100" style="height: 191px;width:100%">

</div>
<div class="col-md-3 px-0" style="margin: -16px 0px 0px -43px;">

<img src="img/lineimg/line_img3.png" class="w-100" style="height: 191px;width:100%">

</div>
<div class="col-md-3 px-0" style="margin: 8px 0px 0px 25px;">

<img src="img/lineimg/line_img4.png" class="w-100" style="height: 191px;width:100%">

</div>

-->




</div>


</div>
</div>
<!--  	Request service-END 	-->


<div class="contentPadding">
<div class="container">
<div class="titleShortcode has-line is-inline">
<h4 class="h4 as text-center">Blogs</h4>
</div>
<div class="row">

<?php
$blogsql = $conn->query("SELECT * FROM bolg where status = '1'"); 
foreach($blogsql as $blogselect){
?>
<div class="col-sm-4">
<div class="ThumbnailWrapper single-blog-post">
<a href="blog-detalis.php?id=<?php echo $blogselect['slugurl'];?>" class="imgWrapper imgThumbnail lightbox">
    <img src="admin/uploads/bolg/<?php echo $blogselect['image'];?>" alt="">
</a>
<div class="date-box"><?php echo $blogselect['updatedate'];?></div>
<h6 class="h6 as"><a href="blog-detalis.php?id=<?php echo $blogselect['slugurl'];?>"><?php echo $blogselect['title'];?></a></h6>
<div class="simple-article normall">
<p><?php echo substr($blogselect['tagline'], 0, 150) .((strlen($blogselect['tagline']) > 150) ? '...' : ''); ?></p>
</div>
</div>
<div class="emptySpace-xs30"></div>
</div>
<?php } ?>
</div>
</div>
</div>

<div class="contentPadding">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="titleShortcode">
<h4 class="h4 py-3 text-center">FAQ</h4>
</div>
<div class="accordeon">

<?php
$faqselect = "SELECT * FROM tbl_faqs WHERE status='1'";
$faqdata =  $conn->query($faqselect);
foreach($faqdata as $faqdatareasult){ ?>
<div class="accordeon-title active accordeon-faq"><?php echo $faqdatareasult['faq_questions'] ; ?><div class="accToggle"><span></span><span></span></div></div>
<div class="accordeon-toggle accordeon-faq">
<div class="simple-article normall">
<p><?php echo $faqdatareasult['faq_answers'] ; ?></p>
</div>
</div>
<?php } ?>    

<div class="emptySpace15"></div>

</div>
</div>
</div>
</div>
</div>

<style>
.h4.h4.as.ml-5 {
margin-left: 50px;
}


.ThumbnailWrapper.style2 {
border: 3px solid #f7f7f7;
box-shadow: 9px 3px 9px 2px #f7f7f79e;
border-radius: 3px;
text-align: center;
padding-bottom: 15px;
/* width: 119%;*/
height: 209px;
}

.h4.h4.as {
margin-top: 30px;
}

.hyper .has-line .is-inline {
margin-top: 20px;
text-align: center;
}

</style>




<?php include('include/footer.php'); ?>  

