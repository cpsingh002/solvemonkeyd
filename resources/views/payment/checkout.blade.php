@extends('layouts.base1')

@section('content')
    <style>
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
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

        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>

    <main>
        <div class="row">
            <div class="col-75 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-50">
                            <div class="mb-5">
                                <h2 class="mb-0 fs-exact-18">Package Details:</h2>
                            </div>
                            <label class="form-label">Package Name: <strong>{{ $package->pname }}</strong></label>
                            <label class="form-label">Package Type: <strong>{{ $package->ptype }}</strong></label>
                            <label class="form-label">Package Price: <strong>₹{{ $package->price }}</strong></label>
                            <label class="form-label">Package Validity (In days):
                                <strong>{{ $package->validity }}</strong></label>
                            <label class="form-label">Visiting Count: <strong>{{ $package->count }}</strong></label>
                            <p>{!! $package->description !!}</p>
                        </div>

                        <div class="col-25">
                            <h3>Payment</h3>
                            <label>Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                        </div>
                    </div>
                    @if($package->price > 0)
                        <button id="payBtn" class="btn">Continue to checkout</button>
                    @else 
                        <a href="{{route('package.freesuccess',['sid'=>$package->pslug])}}"><button id="freeplanBtn" class="btn">Continue to Add</button></a>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    {{-- Razorpay JS --}}
    @if($package->price > 0)
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('payBtn').onclick = function(e) {
            e.preventDefault();

            const options = {
                key: "{{ env('RAZORPAY_KEY') }}",
                amount: "{{ $package->price * 100 }}",
                currency: "INR",
                name: "SolveMonkey",
                description: "Payment for {{ $package->pname }}",
                order_id: "{{ $razorpayOrder['id'] }}",

                handler: function(response) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = "{{ route('razorpay.success') }}";

                    // CSRF token
                    form.innerHTML += `<input type="hidden" name="_token" value="{{ csrf_token() }}">`;

                    // Razorpay fields
                    form.innerHTML +=
                        `<input type="hidden" name="razorpay_payment_id" value="${response.razorpay_payment_id}">`;
                    form.innerHTML +=
                        `<input type="hidden" name="razorpay_order_id" value="${response.razorpay_order_id}">`;
                    form.innerHTML +=
                        `<input type="hidden" name="razorpay_signature" value="${response.razorpay_signature}">`;

                    // Package ID
                    form.innerHTML += `<input type="hidden" name="package_id" value="{{ $package->id }}">`;

                    document.body.appendChild(form);
                    form.submit();
                },

                prefill: {
                    name: "{{ auth()->user()->name ?? 'Guest' }}",
                    email: "{{ auth()->user()->email ?? 'guest@example.com' }}"
                },

                theme: {
                    color: "#528FF0"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
    @endif
@endpush
