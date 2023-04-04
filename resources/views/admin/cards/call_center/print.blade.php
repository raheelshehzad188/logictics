<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GNP Logistics</title>

    <link rel="stylesheet"
          href="{{ asset('themes/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/dist/css/adminlte.min.css') }}">

    <style>
        @page {
            size: auto;
            margin: 0mm;
        }

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
        }

        body {
            line-height: 20px;
            font-size: 19px;
            zoom: 94%;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    @foreach ($records as $record)
        @if($record['card_no'])
            <div class="row pagebreak">
                <div class="col-xs-6" style="padding-left: 20px; padding-top: 10px;">
                    <img src="{{ asset('print-logo.png') }}" style="height: 70px; margin-bottom: 10px">
                    <address style='min-width: 340px;'>
                        <b>Civil ID:</b> {{$record['civil_id']}}<br>
                        <span
                            style="font-size: 16px; display:block; width:350px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><b>Name:</b>
                            {{ $record['customer_name'] }}</span><br>
                        @if ($record['telephone_no'])
                            <b>Tel:</b> {{ $record['telephone_no'] }}<br>
                        @endif
                        @if ($record['mobile_no'])
                            <b>Mobile:</b> {{ $record['mobile_no'] }}<br>
                        @endif
                        @if ($record['delivery_date'])
                        <!--<b>Delivery Date:</b> {{ date('d M Y', strtotime($record['delivery_date'])) }}<br>-->
                        @endif
                        @if ($record['area_name'])
                            <b>Area:</b> {{ $record['area_name'] }}<br>
                        @endif
                        @if ($record['block_name'])
                            <b>Block:</b> {{ $record['block_name'] }}<br>
                        @endif
                        @if ($record['street'] || $record['avenue'] || $record['house_no'] || $record['floor'] || $record['flat'])
                            <span style="display:block;width:350px;word-wrap:break-word;"><b>Address:</b>
                                @if ($record['street'])
                                    {{ $record['street'] }},
                                @endif
                                @if ($record['avenue'])
                                    Avenue-{{ $record['avenue'] }},
                                @endif
                                @if ($record['house_no'])
                                    House/Building-{{ $record['house_no'] }},
                                @endif
                                @if ($record['floor'])
                                    Floor-{{ $record['floor'] }},
                                @endif
                                @if ($record['flat'])
                                    Flat-{{ $record['flat'] }}
                            </span>
                        @endif
                        @endif
                    </address>
                </div>
                <div class="col-xs-6" style="padding-right: 10px;  padding-top: 10px;">
                    <address style="font-size: 20px; width: 225px;">
                        @if ($record['area_name'])
                            <b>Area:</b> {{ $record['area_name'] }}
                            <br>
                        @endif
                        @if ($record['block_name'])
                            <b>Block:</b> {{ $record['block_name'] }}
                        @endif
                    </address>
                    @php
                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    @endphp
                    @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                    @endphp
                    <br>
                    <img
                        src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($record['card_no'], $generatorPNG::TYPE_CODE_128, 2, 60)) }}">
                    <h3 style="letter-spacing: 2.5px;font-size:1.5rem">{{ $record['card_no'] }}</h3>
                    {{--                <h6>Description: RECARD ATM BUSINESS</h6> --}}
                    {{--                <br> --}}
                    {{--                <address> --}}
                    {{--                    <b>Batch No:</b> {{$record['batch_no']}}<br> --}}
                    {{--                    <b>Note:</b> {{$record['remark']}}<br> --}}
                    {{--                </address> --}}
                </div>
            </div>
        @else
            <div>Card number not available!</div>
        @endif
    @endforeach
</div>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script>
    @if($record['card_no'])
    window.addEventListener("load", window.print());
    @endif
</script>
</body>

</html>
