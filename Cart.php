<?php include('partials-front/header.php'); ?>

<!DOCTYPE html>
<html lang="en">

    <div>
        <section>
                <div class="text-center">
                    <h1>Cart</h1>
                <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                
                    <div>
                    <span id="day"></span> : <span id="year"></span>
                    </div>
                </div>    
                </div>
                </section>
        <?php
        $user_id=$_SESSION['id'];
        $user_products_query ="SELECT p.id, p.title, v.shop_name, p.price, p.image_name, ut.address FROM user_items as ut INNER JOIN product_list p on p.id=.ut.product_id INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE user_id='$user_id'";
        $user_products_result=mysqli_query($conn,$user_products_query) or die(mysqli_error($conn));
        $no_of_user_products=mysqli_num_rows($user_products_result);
        $sum=0;
        $vtotal=0;

        //Alert
        if($no_of_user_products==0){
        //echo"Add Item to cart first.";
        ?>
        <script>
            window.alert("No food in the cart!!");
            function alert(){
                                    swal({
                                        icon:'error',
                                        title:'No Food in the Cart!',
                                        text:'ORDER NOW',
                                    });
            }
        </script>
        <?php
        }else{
            while($row=mysqli_fetch_array($user_products_result))
            {
                $sum=$sum+$row['price'];
                $vtotal += $sum;
            }
        }
    ?>
    <div class="container">
        <div class="table-bordered table-striped">
        <?php
            $user_products_result=mysqli_query($conn,$user_products_query) or die(mysqli_error($conn));
            $no_of_user_products=mysqli_num_rows($user_products_result);
            $counter=1;
            while($row=mysqli_fetch_array($user_products_result)){
            $image_name = $row['image_name'];
            $address = $row['address'];
            
            ?>
                <form action="billing.php" method="POST" id="checkout-form" class="food-search">
                    <fieldset class="order">
                    
                    <div class="food-menu-img">
                                <?php 
                                
                                    //Check whether image available or not
                                    if($image_name=="")
                                    {
                                        //image not available
                                        echo "<div class='error'>Image not available.</div>";
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Chicken hawian pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                            ?>
                                
                        </div>

                <!-- Food Added -->
                <div class="food-menu-desc">
                    <h4><?php echo $row['title']?></h4>
                    <input type="hidden" name="food" value="<?php echo $row['title']?>">

                    <p class="food-price">₱<?php echo $row['price']?></p>
                    <input type="hidden" name="price" value="<?php echo $row['price']?>">

                    <div>Vendor: <?= $row['shop_name']; ?></div>
                    <input type="hidden" name="shop_name" value="<?= $row['shop_name']; ?>">
                    
                    <div class="order-label">Quantity: </div> 
                        <input type="number" id="qty" name="qty" value="1" class=" text-center" >
                            
                    <a href="cart_remove.php?id=<?php echo $row['id'] ?>"  name="submit" value="Confirm Order" class="btn btn-primary"> Remove</a>
                

            <br>
            <div class="col-12 border">
                <div class="d-flex">
                
                <?php $counter=$counter+1;  ?>
                
                <div class="order-label">Address:
                    <a href="address.php" onClick="sweet()"><span class="glyphicon glyphicon-edit"></span></a>
                    <b><?php echo $address ?></b>
                </div>
                <?php }?>
                </fieldset>

                <div class="col-9 text-center font-weight-bold">
                <div class="order-label">Payment Method</div>
                           <select name="payment">
                              <option value="">SELECT</option>
                              <option value="Cash">Cash</option>
                              <option value="Cash on Delivery">Cash on Delivery</option>
                              <option value="Gcash">GCash</option>
                           </select>
                           
                           
                           <h3>Grand Total: ₱<?php echo $sum; ?></h3>
                           <button type="submit" class="btn btn-flat btn-default btn-primary"><span class="glyphicon glyphicon-check"></span> Place Order</button>
                </div>
            </form>
                        </thead>
                    </div>
                </div>
            </form>
                <!--  end  -->

                        <!-- date-time -->
                        <script>
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
</script>
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>
                                </div>
                            </div>
                        </div>
                    </div>
                    </thead>
                </section>
            </div>
        </div>
    </div>
</html>