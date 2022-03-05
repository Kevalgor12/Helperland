<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://localhost/Helperland/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <?php
    if(isset($_SESSION['userid']))
    {
      include("header_3.php");
    }
    else
    {
      include("header_1.php");
    }
    if(isset($_SESSION['login_alert']))
    { 
      if(($_SESSION['login_alert']) == 0) 
      {  
        echo '<script> alert("you are not a costomer , please login as a customer."); </script>';
      }
      if(($_SESSION['login_alert']) == 1) 
      {  
        echo '<script> alert("please login first"); </script>';
      }
    }
  unset($_SESSION['login_alert']);
  ?>

  <section class="home" id="home">
    <div class="max-width">
      <div class="home-content">
        <div class="text-1">Don't feel like doing housework?</div>
        <div class="text-2">Fine! Book your cleaner now through Helperland and enjoy the benefits</div>
        <div class="text-2"><img src="http://localhost/Helperland/assets/images/ic-check.png"> tested & insured helpers</div>
        <div class="text-2"><img src="http://localhost/Helperland/assets/images/ic-check.png"> easy booking process</div>
        <div class="text-2"><img src="http://localhost/Helperland/assets/images/ic-check.png"> friendly customer service</div>
        <div class="text-2"><img src="http://localhost/Helperland/assets/images/ic-check.png"> secure online payment method</div>
      </div>
      <div class="button">
        <a href="http://localhost/Helperland/?controller=Helperland&function=gotobookservicepage"><button class="button-cleaner mx-auto">Let's Book a Cleaner</button></a>
      </div>
      <div class="pay-service">
        <div class="pay-content">
          <div class="pay-image">
            <img src="http://localhost/Helperland/assets/images/step-1.png">
          </div>
          <br>
          <span>Enter your Postcode</span>
        </div>
        <div class="pay-content">
          <div class="pay-arrow">
            <img src="http://localhost/Helperland/assets/images/step-arrow-1.png">
          </div>
        </div>
        <div class="pay-content">
          <div class="pay-image">
            <img src="http://localhost/Helperland/assets/images/step-2.png">
          </div>
          <br>
          <span>Select your plan</span>
        </div>
        <div class="pay-content">
          <div class="pay-arrow">
            <img src="http://localhost/Helperland/assets/images/step-arrow-1-copy.png">
          </div>
        </div>
        <div class="pay-content">
          <div class="pay-image">
            <img src="http://localhost/Helperland/assets/images/step-3.png">
          </div>
          <br>
          <span>Pay securely online</span>
        </div>
        <div class="pay-content">
          <div class="pay-arrow">
            <img src="http://localhost/Helperland/assets/images/step-arrow-1.png">
          </div>
        </div>
        <div class="pay-content">
          <div class="pay-image">
            <img src="http://localhost/Helperland/assets/images/step-4.png">
          </div>
          <br>
          <span>Enjoy amazing service</span>
        </div>
      </div>
      <div class="arrow">
        <img src="http://localhost/Helperland/assets/images/group-18_5.png">
      </div>
    </div>
  </section>

  <section class="why-helperland" id="why-helperland">
    <div class="max-width">
      <div class="helperland-content">
        <b class="text-1">Why Helperland</b>
      </div>
      <div class="helperland-images row justify-content-center me-0 ms-0">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
          <img class="img-fluid" src="http://localhost/Helperland/assets/images/helper-img-2.png">
          <h3>Experience & Vetted <br> Professionals</h3>
          <span>
          We want you to be completely satisfied with our service and to feel comfortable at home. In order for us to be able to guarantee this, our helpers go through a test procedure. The cleaning staff can only call themselves helpers if they meet our high standards.
          </span>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
          <img class="img-fluid" src="http://localhost/Helperland/assets/images/helper-img-3.png"><br>
          <h3>Secure Online Payment</h3>
          <span>
          We have transparent prices! You don't have to scrape together small change or leave money on the sideboard: Pay your helper simply and securely using the online payment method. You will also receive an invoice for each completed cleaning.
          </span>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
          <img class="img-fluid" src="http://localhost/Helperland/assets/images/helper-img-4.png"><br>
          <h3>Dedicated Customer Service</h3>
          <span>
          Do you have a question or need assistance with the booking process? Our customer service will be happy to help you with words and deeds. You can find out how to contact us by looking under "Contact". We look forward to hearing or reading from you.
          </span>
        </div>
      </div>
    </div>
  </section>

  <section class="blog" id="blog">
    <img class="blog-img-left" src="http://localhost/Helperland/assets/images/blog-left-bg.png" alt="">
    <img class="blog-img-right" src="http://localhost/Helperland/assets/images/blog-right-bg.png" alt="">
    <div class="max-width">
      <div class="row">
        <div class="blog-content col-lg-7">
          <p class="lorem"><b>We don't know what makes you happy, but...</b></p>
          <p>
            if it's not dusting, our friendly helpers will relieve you of this burden. Don't fret anymore that valuable time is wasted on housework, but enjoy life to the full. You are worth filling your time with beautiful experiences. Finally free yourself and enjoy the time you have gained: go partying, unwind, play with your children, meet up with friends or dare a bungee jump. You can find more leisure ideas and exclusive events in our blog - guaranteed free of dust and cleaning tips!
          </p>
        </div>
        <div class="bloggroup-img col-lg-5">
          <img class="img-fluid" src="http://localhost/Helperland/assets/images/group-36.png">
        </div>
      </div>
      <div class="our-blog">
        <p><b>Our Blog</b></p>
      </div>
      <div class="blog-images">
        <div class="blog-img-text">
          <img class="blog-img img-fluid" src="http://localhost/Helperland/assets/images/group-28.png">
          <p class="blog-lorem"><b>Lorem ipsum dolor sit amet</b></p>
          <p class="blog-date">January 28, 2019</p>
          <p class="blog-text">Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit. Sed fermentum metus <br> pulvinar aliquet.</p>
          <p class="blog-readpost">Read the Post <img class="blog-arrow" src="http://localhost/Helperland/assets/images/shape-2-copy-3.png"></p>
        </div>
        <div class="blog-img-text">
          <img class="blog-img img-fluid" src="http://localhost/Helperland/assets/images/group-29.png">
          <p class="blog-lorem"><b>Lorem ipsum dolor sit amet</b></p>
          <p class="blog-date">January 28, 2019</p>
          <p class="blog-text">Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit. Sed fermentum metus <br> pulvinar aliquet.</p>
          <p class="blog-readpost">Read the Post <img class="blog-arrow" src="http://localhost/Helperland/assets/images/shape-2-copy-3.png"></p>
        </div>
        <div class="blog-img-text">
          <img class="blog-img img-fluid" src="http://localhost/Helperland/assets/images/group-30.png">
          <p class="blog-lorem"><b>Lorem ipsum dolor sit amet</b></p>
          <p class="blog-date">January 28, 2019</p>
          <p class="blog-text">Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit. Sed fermentum metus <br> pulvinar aliquet.</p>
          <p class="blog-readpost">Read the Post <img class="blog-arrow" src="http://localhost/Helperland/assets/images/shape-2-copy-3.png"></p>
        </div>
      </div>
    </div>
  </section>

  <section class="customer-say" id="customer-say">
    <div class="max-width">
      <div class="customer-content">
        <div>
          <p class="customer"><b>What Our Customers Say</b></p>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center mb-5 me-0 ms-0">
          <div class="col">
            <div class="card">
              <div class="card-body p-4">
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/group-31.png" alt="...">
                  </div>
                  <div class="flex-grow-1 ms-3 align-self-center">
                    <h5 class="mb-0">Lary Watson</h5>
                    <small class="text-muted">Manchester</small>
                  </div>
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/message.png" alt="...">
                  </div>
                </div>
                <p class="card-text">Great service 👍 Thank you</p>
                <a href="#">Read More <img src="http://localhost/Helperland/assets/images/shape-2.png" alt="right arrow"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body p-4">
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/group-31.png" alt="...">
                  </div>
                  <div class="flex-grow-1 ms-3 align-self-center">
                    <h5 class="mb-0">Lary Watson</h5>
                    <small class="text-muted">Manchester</small>
                  </div>
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/message.png" alt="...">
                  </div>
                </div>
                <p class="card-text">Very good..!</p>
                <a href="#">Read More <img src="http://localhost/Helperland/assets/images/shape-2.png" alt="right arrow"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body p-4">
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/group-31.png" alt="...">
                  </div>
                  <div class="flex-grow-1 ms-3 align-self-center">
                    <h5 class="mb-0">Lary Watson</h5>
                    <small class="text-muted">Manchester</small>
                  </div>
                  <div class="flex-shrink-0">
                    <img src="http://localhost/Helperland/assets/images/message.png" alt="...">
                  </div>
                </div>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.</p>
                <p class="card-text">Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
                <a href="#">Read More <img src="http://localhost/Helperland/assets/images/shape-2.png" alt="right arrow"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <p class="newsletter">GET OUR NEWSLETTER</p>
    </div>
    <div class="text-center">
      <input type="text" name="email" placeholder="YOUR EMAIL" class="your-email mb-3">
      <button type="submit" class="get-news-submit">Submit</button>
    </div>
  </section>

<?php
  include("footer_1.php");
?>