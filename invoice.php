<?php include ('server.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="invoicestyle.css">

    <title>Invoice..!</title>
</head>

<body>
     <div style="width:100%;display:flex;justify-content:center;align-items:center;margin-top:20px;">
     <button onclick = "window.print()" class="btn btn-primary main">Print Invoice</button>
     </div>
    <?php 
    $pick_up_date = $_SESSION['pick_up_date'];
    $drop_date = $_SESSION['drop_date']; 
    $pickupaddress = $_SESSION['address'];
    $pick_up_time = $_SESSION['pick_up_time'];
    $drop_time = $_SESSION['drop_time'];
    $trucknumber = $_SESSION['vehicle_id'];
    $truck_type = $_SESSION['choosen_truck'];
    $totalamount = $_SESSION['price_of_order'];
    $price = $_SESSION['price'];
    $hour = $_SESSION['hour'];
    $amount = $_SESSION['price_of_order'];
    ?>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span>XXXX</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Pick up address : </p>
                            <p class="address"><?php echo $pickupaddress ?></p>
    
                        </div>
                        <!-- <div class="col-5">
                            <p>Drop location :</p>
                            <p class="address"> 777 Brockton Avenue, <br> Abington MA 2351, <br>Vestavia Hills AL </p>
                        </div> -->
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Credit Card</span></p>
                            <!-- <p>Order Number: <span>#868</span></p> -->
                        </div>
                        <div class="col-5">
                            <p>Pickup Date: <span><?php echo $pick_up_date ?></span></p>
                            <p style="margin-left:13px;" >Drop Date:   <span><?php echo $drop_date ?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Truck Description</td>
                            <td>Price</td>
                            <td>Hours</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title">Truck</p>
                                        <?php echo $truck_type?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $price?>/hr</td>
                            <td><?php echo round($hour,2); ?></td>
                            <td>Rs <?php echo $amount ?></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <!-- <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In delectus, adipisci vero est dolore praesentium.</p> -->
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>Rs. <?php echo $amount ?></td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td>Rs. <?php echo $amount ?></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="cart.jpg" class="img-fluid cart-bg" alt="">


        </div>

   
    </div>










</body></html>