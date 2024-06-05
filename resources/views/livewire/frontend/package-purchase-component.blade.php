<style>
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<div>
    <main>
<div class="row">
  <div class="col-75 py-5">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <div class="mb-5">
                <h2 class="mb-0 fs-exact-18">Package Details:</h2>
            </div>
            <label class="form-label">Package Name: <strong>{{$this->pname}}</strong></label>
            <label class="form-label">Package Type: <strong>{{$this->ptype}}</strong></label>
            <label class="form-label">Package Price: <strong>{{$this->price}}</strong></label>
            <label class="form-label">Package Validity(In days): <strong>{{$this->validity}}</strong></label>
            <label class="form-label">Visiting Count: <strong>{{$this->count}}</strong></label>
                
        </div>

          <div class="col-25">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  
</div>
</main>

<div class="promotionSetting section-padding2">
                <div class="container">
                    <div class="row mb-24">
                        <div class="col-sm-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Payment</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-10 col-lg-12">
                            <div class="paymentWrapper">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="paymentDetails mb-24">
                                            <div class="paymentDetailsTop mb-24">
                                                <h4 class="priceTittle">Results you’ll get</h4>
                                                <ul class="listing">
                                                    <li class="listItem"><i class="las la-check icon"></i>Your ad will be promoted for 3 days</li>
                                                    <li class="listItem"><i class="las la-check icon"></i>Get upto 10x times more responses</li>
                                                    <li class="listItem"><i class="las la-check icon"></i>Your Ad will be featured for 1st day</li>
                                                </ul>
                                            </div>
                                            <div class="audience">
                                                <h4 class="priceTittle">Results you’ll get</h4>
                                                <ul class="listing">
                                                    <li class="listItem">
                                                        <p class="leftCap">Location</p>
                                                        <p class="rightCap">Utica, Pennsylvania</p>
                                                    </li>
                                                    <li class="listItem">
                                                        <p class="leftCap">Gender</p>
                                                        <p class="rightCap">All</p>
                                                    </li>
                                                    <li class="listItem">
                                                        <p class="leftCap">Age range</p>
                                                        <p class="rightCap">18-45</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="paymentDetails">
                                            <div class="paymentPricing mb-20">
                                                <ul class="listing">
                                                    <li class="listItem">
                                                        <p class="leftCap">Standard promotion plan</p>
                                                        <p class="rightCap">$79.00</p>
                                                    </li>
                                                    <li class="listItem">
                                                        <p class="leftCap">Vat</p>
                                                        <p class="rightCap">$3.49</p>
                                                    </li>
                                                    <li class="listItem">
                                                        <p class="leftCap">Total</p>
                                                        <p class="rightCap">$82.49</p>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="paymentDetailsBottom">
                                                <h4 class="priceTittle">Payment</h4>

                                                <div class="paymentMethod">
                                                    <div class="cs_radio_btn">
                                                        <div class="radio">
                                                            <input id="radio-1" name="radio" type="radio" tabindex="0" />
                                                            <label for="radio-1" class="radio-label"><i class="lar la-credit-card icon"></i>Credit/Debit Card</label>
                                                        </div>
                                                        <div class="radio">
                                                            <input id="radio-2" name="radio" type="radio" tabindex="0" />
                                                            <label for="radio-2" class="radio-label"><i class="lab la-paypal icon"></i>Paypal</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-form">
                                                    <input type="text" placeholder="Card number" />
                                                    <div class="icon"><i class="lar la-credit-card"></i></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="input-form">
                                                            <input type="text" placeholder="Expiry date" />
                                                            <div class="icon"><i class="las la-calendar-week"></i></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="input-form">
                                                            <input type="text" placeholder="CVV/CVC" />
                                                            <div class="icon"><i class="las la-lock"></i></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <span class="infoTitle2"><i class="las la-lock icon"></i>Payment informations are encrypted with 256 bit SSL</span>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="btn-wrapper mb-10">
                                                            <a href="#" class="cmn-btn4 w-100">Confirm payment</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div>