<div class="bg-light">
    <div class="py-3 py-md-5 checkout">
        <div class="container">
            <h2 style="color: #002b80;letter-spacing: 1px;"><b>MY REFERRAL:</b></h2>
            <hr>
            @if($this->totalProductAmount != 0)
                <div class="row">
                    <div class="col-md-12 mb-4 shopping-cart">
                        <div class="shadow bg-white p-3 cart-item">
                            <h4 style="color: #002b80; font-weight: normal">
                                Total amount of referrals to doctors and analyses:
                                <span class="float-end">₴{{$this->totalProductAmount}}</span>
                            </h4>
                            <hr>
                            <small> * When making a referral, you undertake to come to the hospital at the specified time and place</small>
                        </div>
                    </div>
                    <div class="col-md-12 shopping-cart">
                        <div class="shadow bg-white p-3 cart-item">
                            <h4 style="color: #002b80; font-weight: normal">
                                General information
                            </h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full name and Surname</label>
                                    <input style="border-radius: 10px;" type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Telefone</label>
                                    <input style="border-radius: 10px;" type="number" wire:model.defer="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input style="border-radius: 10px;" type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Comment</label>
                                    <textarea style="border-radius: 10px;" wire:model.defer="comment" id="comment" class="form-control" rows="2"></textarea>
                                    @error('comment')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3" wire:ignore>
                                    <label>Choose a payment method: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link nav-link-btn active" id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                                data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                                aria-controls="cashOnDeliveryTab" aria-selected="true"
                                                style="background-color: #4d88ff; color: white; border-radius: 10px; font-weight: normal;">
                                                Cash payment
                                            </button>
                                            <button class="nav-link nav-link-btn" id="onlinePayment-tab" data-bs-toggle="pill"
                                                data-bs-target="#onlinePayment" type="button" role="tab"
                                                aria-controls="onlinePayment" aria-selected="false"
                                                style="border-radius: 10px; color: black; background-color: white; font-weight: normal;">
                                                Card payment
                                            </button>
                                        </div>

                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel"
                                                aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash payment in hospital</h6>
                                                <hr/>
                                                <button type="button" wire:click="codOrder" class="btn"
                                                    style="background-color: #4d88ff; color: white; border-radius: 10px; font-weight: normal;">
                                                    <span wire:target="codOrder">Place a Referral</span>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                                aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Card payment</h6>
                                                <hr/>
                                                <div>
                                                    <div style="max-width: 500px;" id="paypal-button-container"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                let buttons = document.querySelectorAll(".nav-link-btn");

                                                buttons.forEach(button => {
                                                    button.addEventListener("click", function () {
                                                        buttons.forEach(btn => {
                                                            btn.style.backgroundColor = "white";
                                                            btn.style.color = "black";
                                                        });
                                                        this.style.backgroundColor = "#4d88ff";
                                                        this.style.color = "white";
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
            <div class="row" style="text-align: center">
                <div class="col-md-12 mb-4 shopping-cart">
                    <div class="cart-item">
                        <h4 class="mb-4 mt-4" style="color: #002b80">No doctors and analyses in referral</h4>
                        <a href="{{url('/hospitals')}}" class="btn mb-4" style="background-color: #4d88ff; color: white; border-radius: 10px; font-weight: normal;">Search doctors and analyses now</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script>
      paypal.Buttons({
        style: {
            shape: 'pill',
            size: 'small',
            color: 'silver',

        },
        onClick: function()  {
            if (!document.getElementById('fullname').value||
            !document.getElementById('phone').value||
            !document.getElementById('email').value||
            !document.getElementById('comment').value)
            {
                Livewire.emit('validationForAll');
                return false;
            }
            else{
                @this.set('fullname', document.getElementById('fullname').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('comment', document.getElementById('comment').value);
            }
        },
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
                amount: {
                    value: "{{$this->totalProductAmount}}"
                }
            }]
          });
        },
        onApprove(data) {
          return fetch("/my-server/capture-paypal-order", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              orderID: data.orderID
            })
          })
          .then((response) => response.json())
          .then((orderData) => {
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            if(transaction.status == "COMPLETED"){
                Livewire.emit('transactionEmit', transaction.id);
            }
          });
        }
      }).render('#paypal-button-container');
    </script>
@endpush