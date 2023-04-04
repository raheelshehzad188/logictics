<form id="edit_card_form" action="{{route('admin.cards.updateCardDetails')}}" class="form-horizontal" autocomplete="off"
      method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="card card-outline">
            <div class="card-body p-3">
                <h5>Address Details</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Area</label>
                                    <select name="area_id" id="area_id" data-placeholder='--Select--'
                                            class="form-control js-select2  @error('area_id') is-invalid @enderror">
                                        <option value="" selected>Select Area</option>
                                        @foreach($all_areas as $row_area)
                                            <option value="{{ $row_area->id }}" data-lat="{{ $row_area->latitude }}"
                                                    data-lng="{{ $row_area->longitude }}"
                                                    data-name="{{ $row_area->name }}"
                                                    @if($row_area->id == $records->area_id) selected @endif >{{ $row_area->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('area_id')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Block</label>
                                    <select name="block_id" id="block_id" data-placeholder='--Select--'
                                            class="form-control block_id js-select2 @error('block_id') is-invalid @enderror">
                                    </select>
                                    @error('block_id')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" name="street" value="{{$records->street}}"
                                           class="form-control @error('street') is-invalid @enderror">

                                    @error('street')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-12">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Avenue</label>
                                    <input type="text" name="avenue" value="{{$records->avenue}}"
                                           class="form-control @error('avenue') is-invalid @enderror">

                                    @error('avenue')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>House/ building no.</label>
                                    <input type="text" name="house_no" value="{{$records->house_no}}"
                                           class="form-control @error('house_no') is-invalid @enderror">

                                    @error('house_no')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Floor</label>
                                    <input type="text" name="floor" value="{{$records->floor}}"
                                           class="form-control @error('floor') is-invalid @enderror">

                                    @error('floor')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Flat</label>
                                    <input type="text" name="flat" value="{{$records->flat}}"
                                           class="form-control @error('flat') is-invalid @enderror">

                                    @error('flat')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-12">
                            <div class="col-sm-12">
                                <div id="map-section"
                                     style="display:none; width: 100%; height: 250px; background-color: lightgray;"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-outline">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status"
                                            class="form-control js-select2 @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        @if($records->status >= 5)
                                            <option value="0">Reassign</option>
                                        @endif
                                        @foreach($all_status as $row_status)
                                            @if($row_status['parent_id']==0 && $row_status->id != 3)
                                                <option value="{{ $row_status->id }}"
                                                        @if($row_status->id == $records->status) selected @endif>{{ $row_status->name }}</option>
                                            @endif
                                        @endforeach
                                        <optgroup label="Others">
                                            @foreach($all_status as $row_status)
                                                @if($row_status['parent_id']!=0 && ($type != 'call_center' || ($type == 'call_center' && $row_status->id != 4)))
                                                    <option value="{{ $row_status->id }}"
                                                            @if($row_status->id == $records->status) selected @endif>{{ $row_status->name }}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Remark</label>
                                    <textarea id="remark" name="remark" rows="3" cols="50"
                                              class="form-control @error('remark') is-invalid @enderror">{{$records->remark}}</textarea>
                                    @error('remark')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <?php $read = '';
        if ($type == 'call_center') {
            $read = 'readonly';
        }
        ?>
        <div class="card card-outline">
            <div class="card-body p-3">
                <h5>Customer Details</h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Delivery date</label>
                                    <input type="text" name="delivery_date"
                                           class="form-control @error('delivery_date') is-invalid @enderror">
                                    @error('delivery_date')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Batch number</label>
                                    <input type="text" name="batch_no" value="{{$records['batch_no']}}"
                                           class="form-control @error('batch_no') is-invalid @enderror" {{$read}}>

                                    @error('batch_no')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Batch serial number</label>
                                    <input type="text" name="batch_sr_no" value="{{$records['batch_sr_no']}}"
                                           {{$read}} class="form-control @error('batch_sr_no') is-invalid @enderror">

                                    @error('batch_sr_no')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-12">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Card number</label>
                                    <input type="text" name="card_no" value="{{$records['card_no']}}"
                                           {{$read}} class="form-control @error('card_no') is-invalid @enderror">
                                    @error('card_no')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Customer name</label>
                                    <input type="text" name="customer_name" value="{{$records['customer_name']}}"
                                           {{$read}} class="form-control @error('customer_name') is-invalid @enderror">

                                    @error('customer_name')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>CIF number</label>
                                    <input type="text" name="cif_number" value="{{$records['cif_no']}}"
                                           {{$read}} class="form-control @error('cif_number') is-invalid @enderror">

                                    @error('cif_number')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-12">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Civil id</label>
                                    <input type="text" name="civil_id" value="{{$records['civil_id']}}"
                                           {{$read}} class="form-control @error('civil_id') is-invalid @enderror">

                                    @error('civil_id')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Moblie number</label>
                                    <input type="text" name="mobile_number" value="{{$records['mobile_no']}}"
                                           {{$read}} class="form-control @error('mobile_number') is-invalid @enderror">

                                    @error('mobile_number')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Telephone number</label>
                                    <input type="text" name="telephone_number" value="{{$records['telephone_no']}}"
                                           {{$read}} class="form-control @error('telephone_number') is-invalid @enderror">

                                    @error('telephone_number')
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" name="hidden_id" value="{{$records['id']}}">
        <input type="hidden" name="type" value="{{$type}}">
        <input type="hidden" id="latitude" name="latitude" value="{{$records['latitude']}}">
        <input type="hidden" id="longitude" name="longitude" value="{{$records['longitude']}}">
        <input type="hidden" id="hid_block_id" value="{{$records['block_id']}}">
        <button type="submit" class="btn btn-sm bg-gradient-primary float-right"><i class="fas fa-save"></i>&nbsp; <span
                id="submit-button-text">Save</span></button>
    </div>
</form>

<script>
    $(".js-select2").select2();
    //On Area Change
    $('#area_id').on('change', function () {
        var area_id = $('#area_id').val();
        var hid_block_id = $('#hid_block_id').val();
        console.log(area_id);
        $.ajax({
            url: "{{route('admin.cards.getBlock')}}",
            type: "get",
            data: {
                area_id: area_id,
            },
            success: function (res) {
                var len = res.length;
                $(".block_id").empty();
                var optionHtml = '';
                optionHtml += '<option value="" selected>--Please Select--</option>';
                for (var i = 0; i < len; i++) {
                    var sel = '';
                    if (hid_block_id == res[i]['id']) {
                        sel = 'selected';
                    }
                    var id = res[i]['id'];
                    var name = res[i]['name'];
                    optionHtml += '<option  value="' + id + '" ' + sel + '>' + name + '</option>';
                }
                $(".block_id").append(optionHtml);
            }
        });
    });
    $('select[name="area_id"]').trigger('change');

    $(function () {
        var start = moment().add(1, 'days');
        $('input[name="delivery_date"]').daterangepicker({
            startDate: start,
            timePicker: false,
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD/M/yy'
            }
        });
    });

    <?php if ($type == 'call_center') { ?>
    $('select[name=status]').on('change', function () {
        var selectedStatus = $("select[name=status] option:selected").val();

        if (selectedStatus == 1) {
            $('#submit-button-text').text('Save and print');
        } else {
            $('#submit-button-text').text('Save');
        }
    })
    <?php } ?>



    //map code for pickup
    var geocoder = new google.maps.Geocoder();
    var Lat = $("[name='latitude']").val();
    var Lng = $("[name='longitude']").val();
    var areaName = $("[name='area_id']").find('option:selected').data('name');
    loadmap();

    $("[name='area_id']").on('change', function () {
        $('#block_id').val("");
        $("[name='street']").val('');
        var selected = $(this).find('option:selected');
        Lat = selected.data('lat');
        Lng = selected.data('lng');
        areaName = selected.data('name');
        $('#latitude').val(Lat);
        $('#longitude').val(Lng);

        loadmap();

        if (!$("[name='area_id']").val()) {
            $("#block_id").attr("readonly", true);
        } else {
            $("#block_id").attr("readonly", false);
        }
    });

    $('#block_id').on('change', function () {
        $("[name='street']").val('');
        var selected = $(this).find(':selected').text();
        console.log(selected);
        if (selected && parseInt(selected) > 0) {
            var address = "Kuwait " + areaName + " block" + selected;
            geocoder.geocode({'address': address}, function (results, status) {
                //alert(status)
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log("find location", results[0]);
                    Lat = results[0].geometry.location.lat();
                    Lng = results[0].geometry.location.lng();
                    $('#latitude').val(Lat);
                    $('#longitude').val(Lng);

                    loadmap();
                } else {
                    console.log("Didnt find location");
                }
            });
        }
    });

    function loadmap() {
        if (Lat && Lng) {
            $('#map-section').locationpicker({
                location: {
                    latitude: Lat,
                    longitude: Lng
                },
                enableAutocomplete: true,
                enableReverseGeocode: true,
                radius: 0,
                zoom: 14,
                inputBinding: {
                    latitudeInput: $('#latitude'),
                    longitudeInput: $('#longitude'),
                    radiusInput: null,
                    // locationNameInput: $('#block')
                },
                addressFormat: 'postal_code',
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    $('#latitude').val(currentLocation.latitude, currentLocation.latitude);
                    $('#longitude').val(currentLocation.longitude, currentLocation.longitude);
                    var latlng = new google.maps.LatLng(currentLocation.latitude, currentLocation.longitude);
                    // This is making the Geocode request
                    geocoder.geocode({'latLng': latlng}, function (results, status) {
                        if (status !== google.maps.GeocoderStatus.OK) {
                            console.log(status);
                        }
                        // This is checking to see if the Geoeode Status is OK before proceeding
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results);
                            $.each(results, function (i) {
                                if (results[i]['types'][0] == 'route') {
                                    $.each(results[i]['address_components'], function (key, val) {
                                        if (val['types'][0] == 'route') {
                                            console.log(val['long_name']);
                                            $("[name='street']").val(val['long_name']);
                                        }
                                    });
                                }
                            });
                        }
                    });
                    // addresses = geocoder.getReverseGeocodingData(, , 1)
                    console.log('currentLocation', currentLocation);
                    // console.log('addresses', addresses);
                }
            });
        }
    }

</script>
