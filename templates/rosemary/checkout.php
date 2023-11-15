<?php
/* Template name: Checkout */

?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header text-center">
                                <h1>{{Checkout}}</h1>
                                <p>{{Checkout Your Products}}</p>
                            </div><!-- End .page-header -->

                            <div class="checkout-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs text-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab"><span>1</span>{{Shipping}}</a></li>
                                    <li role="presentation"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab"><span>2</span>{{Payment}}</a></li>
                                    <li role="presentation"><a href="#confirmation" aria-controls="confirmation" role="tab" data-toggle="tab"><span>3</span>{{Confirmation}}</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="shipping">
                                        <?php /* 
                                        <div class="tab-header">
                                            <h4>{{Check As}}:</h4>
                                            <div class="radio-inline-container">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="checkout-option" data-target=".check-as-guest">
                                                        <span class="check"></span>
                                                        <span class="circle"></span>
                                                        {{Check out as Guest}}
                                                    </label>
                                                </div><!-- End .radio -->

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="checkout-option" checked data-target=".signup-form">
                                                        <span class="check"></span>
                                                        <span class="circle"></span>
                                                        {{Register}}
                                                    </label>
                                                </div><!-- End .radio -->

                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="checkout-option" data-target=".signin-form">
                                                        <span class="check"></span>
                                                        <span class="circle"></span>
                                                        {{Login}}
                                                    </label>
                                                </div><!-- End .radio -->
                                            </div><!-- End .radio-inline-container -->
                                        </div><!-- End .tab-header -->
                                        */?>

                                        <div class="check-as-guest target-area">
                                            <h3>{{Continue as a guest}}.</h3>
                                            <p>{{Skip this step and move down to below to continue to checkout}}.</p>
                                        </div><!-- End .check-as-guest -->

                                        <form action="#" method="post" class="signup-form target-area active">

                                        <h3>{{SHIPPING ADDRESS}}</h3>
                                        <hr>
                                            <div class="row">


<?php

                                if(!empty($addtopostarea['orders'])){
                                $attributes_array = explode(',', $attributes);
                                foreach ($addtopostarea['orders'] as $key => $value) {
                                    $i++;
                                    $value = $value['shipping'];
                                    $shipping = array_filter($value);
                                    if($value['title'] == ''){continue;}
                                ?>

                                      <div class="col-sm-4">
                                        <div class="form-group">
                                        <label class="control-label"><?=$value['title'];?> <?php if($value['required']){?>*<?php } ?></label>

                                        <?php

                                        $attributes_array = explode(',', $attributes);
                                        foreach ($attributes_array as $key => $ATTS) {
                                            $attributes_array2[$key] = explode(':',$ATTS);
                                        }


                                        $attributes_array_key    = array_search($value['name'], array_column($attributes_array2, 0));

                                        $att_value = $attributes_array2[$attributes_array_key][1];                                              
                                        switch ($value['type']) {
                                            case 'input-text':
                                            // print_r($attributes_array);
                                                if($value['required']){$required='required';}

                                                echo '<input type="text" class="form-control" value="'.$att_value.'" placeholder="" name="'.$value['name'].'" '.$required.'/>';

                                                unset($att_value);
                                                unset($required);


                                        break;
                                        case 'input-select':
                                        
                                        // echo $value['prefix'];

                                        echo '<select type="text" class="form-control" value="'.$att_value.'" placeholder="" name="'.$value['name'].'"/>';

                                        foreach ($value['values'] as $key => $values) {
                                            if($att_value == $values){$selected = 'selected';}
                                            echo '<option value="'.$values.'" '.$selected.'>'.$values.'</option>';
                                            unset($selected);
                                        }
                                        echo '</select>';

                                        break;
                                    
                                        default:
                                            # code...
                                        break;
                                        }
                                        ?>
                                        </div>
                                    </div>


                                    <?php
                                }
                                }
                                ?>

                                

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                         <div class="checkbox"><br/>
                                                        <label>
                                                        <input type="checkbox" name="remember" checked>
                                                        <span class="checkbox-box"><span class="check"></span></span>
                                                        {{My Shipping and billing address are same}}
                                                        </label>
                                                </div><!-- End .checkbox -->
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-4 -->

                                            </div><!-- End .row -->



                                            <div class="clearfix form-action ">
                                                <input type="submit" class="btn btn-accent min-width pull-left submit-shipping" value="{{Continue}}">
                                            </div><!-- End .form-action -->



                                        </form>

                                        <form action="#" class="signin-form target-area">
                                            <div class="form-group">
                                                <label>{{E-mail Address}}*</label>
                                                <input type="email" class="form-control" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label>{{Password}}*</label>
                                                <input type="password" class="form-control" required>
                                            </div><!-- End .form-group -->

                                            <div class="clearfix form-more mb20">
                                                <div class="checkbox pull-left">
                                                    <label>
                                                        <input type="checkbox" name="remember">
                                                        <span class="checkbox-box"><span class="check"></span></span>
                                                        {{Remember Me}}
                                                    </label>
                                                </div><!-- End .checkbox -->
                                                <a href="#" class="help-link">{{LOST YOUR PASSWORD}}?</a>
                                            </div><!-- End .form-more -->

                                            <div class="clearfix form-action">
                                                <input type="submit" class="btn btn-primary pull-left min-width" value="SIGN IN">
                                            </div><!-- End .form-action -->
                                        </form>


                                    </div><!-- End .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="payment">
                                        <div class="tab-header">
                                            <h4>{{Payment Method}}:</h4>
                                            <div class="radio-inline-container">
                                                <img src="/templates/rosemary/assets/images/payment-card.png" alt="Card" class="radio-img">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment-option" checked data-target=".payment-card">
                                                        <span class="check"></span>
                                                        <span class="circle"></span>
                                                        {{Credit Card}}
                                                    </label>
                                                </div><!-- End .radio -->

                                                <img src="/templates/rosemary/assets/images/payment-paypal.png" alt="Paypal" class="radio-img">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="payment-option" data-target=".payment-paypal">
                                                        <span class="check"></span>
                                                        <span class="circle"></span>
                                                        Paypal
                                                    </label>
                                                </div><!-- End .radio -->
                                            </div><!-- End .radio-inline-container -->
                                        </div><!-- End .tab-header -->

                                        <form action="#" class="payment-card target-area active">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Name on Card*</label>
                                                        <input type="text" class="form-control" required>
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Card number*</label>
                                                        <input type="text" class="form-control form-with-icon" placeholder="0000-0000-0000-0000" required>

                                                        <img src="/templates/rosemary/assets/images/icon-input-card.png" alt="Card" class="form-icon">
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>CVV number*</label>
                                                        <input type="text" class="form-control form-with-icon" required>
                                                        <span class="form-icon">
                                                            <img src="/templates/rosemary/assets/images/icon-input-info.png" alt="Card">
                                                        </span>
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-4 -->

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Exp. Month*</label>
                                                        <select class="form-control custom-select">
                                                            <option value="Month">Month</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                        </select>
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-4 -->

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Exp. Year*</label>
                                                        <select class="form-control custom-select">
                                                            <option value="Year">Year</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                        </select>
                                                    </div><!-- End .form-group -->
                                                </div><!-- End .col-sm-4 -->
                                            </div><!-- End .row -->

                                            <div class="clearfix form-action">
                                                <div class="btn-wrap pull-right">
                                                    <span class="btn-payment-info">$405.00</span>
                                                    <input type="submit" class="btn btn-accent" value="Pay Now">
                                                </div><!-- End .btn-wrap -->
                                            </div><!-- End .form-action -->
                                        </form>

                                        <div class="payment-paypal target-area">
                                            <h3>{{Sorry Paypal is not available now.}}</h3>
                                            <p>{{Please Try again later or use your credit card to pay.}}</p>
                                        </div><!-- End .check-as-guest -->
                                    </div><!-- End .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="confirmation">
                                        <div class="checkout-confirm">
                                            <img src="/templates/rosemary/assets/images/okay.png" alt="Okay">
                                            <h3>{{Payment Complete}}</h3>
                                            <h4>{{Thank you for your order}}</h4>
                                            <p>{{We have sent you an email with all the details of your order to your email address.}}</p>
                                        </div><!-- End .checkout-confirm -->
                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->
                            
                        </div><!-- End .col-md-9 -->



                        

                    </div><!-- End .row -->
                </div><!-- End .container -->
