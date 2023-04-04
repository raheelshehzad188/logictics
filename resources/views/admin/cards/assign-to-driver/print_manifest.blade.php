<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GNP Logistics</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/AdminLTE/dist/css/adminlte.min.css') }}">

    <style>
        @page {
            size: auto;
            margin: 0mm;
        }

        @media print {
            table {
                page-break-after: auto
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto
            }

            td {
                page-break-inside: avoid;
                page-break-after: auto
            }

            thead {
                display: table-header-group
            }

            tfoot {
                display: table-footer-group
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th colspan="6">
                            <div class="print-header">
                                <div class="row"
                                    style="display: flex; justify-content: space-between; align-items: center;padding: 15px;border-bottom: 2px dashed #d0d0d0;">
                                    <div>
                                        <img src="{{ asset('uploads/menifest/logo.png') }}" width=180"
                                            class="d-inline-block align-middle" alt="">
                                    </div>
                                    <div>
                                        <h2><b>Delivery Manifest</b></h2>
                                    </div>
                                    <div>
                                        <img src="{{ asset('uploads/menifest/bank.png') }}" width="180"
                                            class="d-inline-block align-middle" alt="">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12 text-center">
                                        <b> Date: {{ $date }}</b>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-12 text-center">
                                        <b>Driver: {{ $driver_name }}</b>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Customer Name</th>
                        <th width="10%">Mobile</th>
                        <th width="10%">ID Number</th>
                        <th width="40%">Address</th>
                        <th width="15%">Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $row_key => $row_record)
                        <tr @if ($row_key == 19) class="pagebreak" @endif>
                            <td>{{ $row_key + 1 }}</td>
                            <td>{{ $row_record->customer_name }}</td>
                            <td>{{ $row_record->mobile_no }}</td>
                            <td>{{ $row_record->civil_id }}</td>
                            <td>
                                @if ($row_record->street)
                                    {{ $row_record->street }},
                                @endif
                                @if ($row_record->avenue)
                                    Avenue-{{ $row_record->avenue }},
                                @endif
                                @if ($row_record->house_no)
                                    House/Building-{{ $row_record->house_no }},
                                @endif
                                @if ($row_record->floor)
                                    Floor-{{ $row_record->floor }},
                                @endif
                                @if ($row_record->flat)
                                    Flat-{{ $row_record->flat }} ,
                                @endif
                                @if ($row_record->block_name)
                                    Block-{{ $row_record->block_name }} ,
                                @endif
                                @if ($row_record->area_name)
                                    {{ $row_record->area_name }}
                                @endif
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
