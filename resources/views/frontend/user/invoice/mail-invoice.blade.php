<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Referral #{{$order->id}}</title>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            margin-bottom: 0px !important;
            border-radius: 10px;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #002b80;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h2>Thank you for your Referral</h2>
        <p>
            Thank you for purchasing with Medbook
        </p>
    </div>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2" style="border: 1px solid #ffffff;">
                    <h2 class="header-admin" style="color: #002266; "><a style="font-size: 30px">MedBook</a> <a style="font-weight: normal !important;"> - main partner in making an appointment with a Doctor and Analyses</a></h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data" style="border: 1px solid #ffffff;">
                    <span>Referral Id: #{{$order->id}}</span> <br>
                    <span>Date: {{date('d/m/Y')}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Referral Details:</th>
                <th width="50%" colspan="2">User Details:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Referral Id:</td>
                <td>{{$order->id}}</td>

                <td>Email Id:</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>Full Name:</td>
                <td>{{$order->fullname}}</td>

                <td>Phone:</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>2{{$order->created_at->format('d-m-Y h:i A')}}</td>

                <td>Comment:</td>
                <td>{{$order->comment}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{$order->payment_mode}}</td>

                <td>Referral Status:</td>
                <td>{{$order->status_message}}</td>
            </tr>
        </tbody>
    </table>

    <table style="margin-top: 20px">
        <thead>
            <tr>
                <th class="no-border text-start heading" style="font-size: 18px" colspan="4">
                    Referral Items:
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Doctors & Analyses</th>
                <th>Date & Time</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @foreach ($order->orderItems as $orderItem)
            <tr>
                <td width="10%">{{ $orderItem->id }}</td>
                <td>
                    @if ($orderItem->doctor)
                        {{ $orderItem->doctor->name }} {{ $orderItem->doctor->surname }} - {{ $orderItem->doctor->name_of_specialty }}
                    @elseif ($orderItem->analysis)
                        {{ $orderItem->analysis->name }}
                    @else
                        <span class="text-danger">No Analyses and Doctors added to Plans</span>
                    @endif
                </td>
                <td>
                    @if ($orderItem->doctorTime)
                        {{ $orderItem->doctorTime->time->name }}
                    @elseif ($orderItem->analysisTime && $orderItem->analysisTime->time)
                        {{ $orderItem->analysisTime->time->name }}
                    @else
                        <span class="text-danger">No time added</span>
                    @endif
                </td>
                <td width="10%">${{ $orderItem->price }}</td>
                @php
                    $totalPrice += $orderItem->price;
                @endphp
            </tr>
            @endforeach
            <tr style="height: 20px;"></tr>
            <tr>
                <td colspan="3" class="total-heading">Total Amount:</td>
                <td colspan="1" class="total-heading">${{ $totalPrice }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <h3 class="text-center" style="font-weight: normal !important;">
        Your health is our priority!
    </h3>

</body>
</html>
