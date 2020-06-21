<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4"><strong>Tambah Bis</strong></h1>
                                </div>
                                <form class="user" method="POST" action="">
                                    <div class="form-group">
                                        <label>Nama Bis</label>
                                        <input type="text" class="form-control" name='bus' id='bus' placeholder="Masukan nama bis" />

                                    </div>
                                    <div class="form-group">
                                        <label>Berangkat Dari</label>
                                        <input type="text" name='source' value='' id='source' class="form-control" placeholder="Masukan Kota Asal" />
                                    </div>
                                    <div class="form-group">
                                        <label>Pergi Ke</label>
                                        <input type="text" value='' name='destination' id='destination' class="form-control" placeholder="Masukan Kota Tujuan" />
                                    </div>
                                    <div class="form-group">
                                        <label>Rute</label>
                                        <input type="text" name='via[]' class='form-control via' style='width:95%!important' placeholder="Masukan Nama Kota atau Tempat" class="form-control " />
                                        <span id='via'>
                                        </span>
                                        <a href='#' id='addVia' title='Tambah Kota Yang Dilewati'><i class='soap-icon-plus circle'></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label>Tarif</label>
                                        <input type="text" name='price' id='price' class="form-control" placeholder="Masukan tarif dalam rupiah tanpa titik" />
                                    </div>

                                    <div class="form-group">
                                        <label>Fasilitas</label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='1' />
                                            Stopkontak<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='2' />
                                            Makanan dan
                                            Minuman<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='3' /> AC <br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='4' /> Hiburan <br>
                                        </label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='5' />
                                            Bantal dan
                                            Selimut<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='6' />
                                            Bagasi<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='7' /> Kursi
                                            Recliner<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='8' /> Ruang
                                            Merokok<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='9' />
                                            Sandaran Kaki<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='10' />
                                            Toilet<br></label>
                                        <br>
                                        <label><input type="checkbox" name="facilities[]" id="facilities" value='11' />
                                            Tempat Istirahat<br></label>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Bis</label>
                                        <br>
                                        <input class="file-upload__input-custom" type="file" name="foto" id="foto">

                                    </div>


                                    <!-- <label>Pulang Pergi</label>
                                    <div class="selector">
                                        <select id='turnBack' name='turnBack'>
                                            <option value='N'>Tidak</option>
                                            <option value='Y'>Ya/option>
                                        </select>
                                    </div> -->

                                    <button type="submit" name='submit' value='Simpan' class="btn btn-primary btn-submit">Simpan</button><br><br>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<br>
<script type="text/javascript" data-pagespeed-no-defer>
    pagespeed.lazyLoadImages.overrideAttributeFunctions();
</script>
<script src="https://jadwalbis.com/js/jquery.validate.js"></script>
<script>
    tjq(document).ready(function() {
        tjq("#formInput").validate({
            submitHandler: function() {
                tjq.ajax({
                    url: "https://jadwalbis.com/jadwal/ajaxKontribusi",
                    type: "POST",
                    beforeSend: function() {
                        tjq("#formInput").hide();
                        tjq('#contibuteLoading').show();
                    },
                    data: tjq("#formInput").serialize(),
                    success: function(data, textStatus, jqXHR) {
                        tjq('#contibuteLoading').hide();
                        tjq('#contributeMsg').show();
                        tjq('#contributeMsg #messageBody').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });
            }
        });
        tjq("#backToContribute").on("click", function() {
            tjq("#contributeMsg").hide();
            tjq("#formInput").show();
            name = tjq("#formInput #name").val();
            tjq("#formInput")[0].reset();
            tjq("#formInput #name").val(name);
        });
        tjq("#formReview").validate({
            submitHandler: function() {
                tjq.ajax({
                    url: "https://jadwalbis.com/jadwal/ajaxUlasan",
                    type: "POST",
                    beforeSend: function() {
                        tjq("#formReview").hide();
                        tjq('#reviewLoading').show();
                    },
                    data: tjq("#formReview").serialize(),
                    success: function(data, textStatus, jqXHR) {
                        tjq('#reviewLoading').hide();
                        tjq('#reviewMsg').show();
                        tjq('#reviewMsg #messageBody').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });
            }
        });
        tjq("#backToReview").on("click", function() {
            tjq("#reviewMsg").hide();
            tjq("#formReview").show();
            tjq("#formReview")[0].reset()
        });
        tjq("#turnBack").on("change", function() {
            if (tjq(this).val() == 'Y') {
                tjq("#turnBackSch").show();
            } else
                tjq("#turnBackSch").hide();
        });
        tjq("#addVia").on("click", function() {
            tjq("#via").append(
                "<span><input type='text' name='via[]' class='form-control via' style='width:90% !important;margin-top:5px;' class='input-text full-width ' /> <a href='#' class='removeVia' title='Hapus'><i class='soap-icon-minus circle'></i></a></span>"
            );
            tjq(".removeVia").on("click", function() {
                tjq(this).parent().remove();
                return false;
            });
            tjq(".via").autocomplete({
                source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
                minLength: 1,
                search: function() {
                    tjq(this).addClass('working');
                },
                open: function() {
                    tjq(this).removeClass('working');
                },
                select: function(event, ui) {
                    if (ui.item == null) tjq(this).next("input").val("");
                    else tjq(this).next("input").val(ui.item.id);
                }
            });
            return false;
        });
        tjq("#formSearch #source").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
                tjq(this).next("input").val("");
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else {
                    tjq(this).next("input").val(ui.item.id);
                    var parentId = ui.item.id;
                    var cityCode = ui.item.cityCode;
                    tjq.ajax({
                        url: "https://jadwalbis.com/jadwal/ajaxGetSpecificPlace",
                        type: "POST",
                        dataType: "html",
                        beforeSend: function() {
                            tjq("#formSearch #specificSource").addClass('working');
                        },
                        data: {
                            parentId: parentId,
                            cityCode: cityCode
                        },
                        success: function(data, textStatus, jqXHR) {
                            tjq("#formSearch #specificSource").removeClass(
                                'working');
                            if (parseInt(data) > 0) {
                                tjq("#formSearch #specificSource").show();
                                tjq("#formSearch #specificSource").attr(
                                    'placeholder',
                                    'Masukan nama jalan/tempat lebih spesifik di ' +
                                    ui.item.cityGeneralName + ' (opsional)');
                                tjq("#formSearch #specificSource").autocomplete({
                                    source: "https://jadwalbis.com/jadwal/ajaxSearchSpecificCity?parentId=" +
                                        parentId + "&cityCode=" + cityCode,
                                    minLength: 1,
                                    search: function() {
                                        tjq(this).addClass('working');
                                        tjq(this).next("input").val("");
                                    },
                                    open: function() {
                                        tjq(this).removeClass(
                                            'working');
                                    },
                                    response: function(event, ui) {
                                        tjq(this).removeClass(
                                            'working');
                                    },
                                    select: function(event, ui) {}
                                });
                            } else {
                                tjq("#formSearch #specificSource").hide();
                                tjq("#formSearch #specificSource").val('');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }
            }
        });
        tjq("#formSearch #destination").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
                tjq(this).next("input").val("");
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else {
                    tjq(this).next("input").val(ui.item.id);
                    var parentId = ui.item.id;
                    var cityCode = ui.item.cityCode;
                    tjq.ajax({
                        url: "https://jadwalbis.com/jadwal/ajaxGetSpecificPlace",
                        type: "POST",
                        dataType: "html",
                        beforeSend: function() {
                            tjq("#formSearch #specificDestination").addClass(
                                'working');
                        },
                        data: {
                            parentId: parentId,
                            cityCode: cityCode
                        },
                        success: function(data, textStatus, jqXHR) {
                            tjq("#formSearch #specificDestination").removeClass(
                                'working');
                            if (parseInt(data) > 0) {
                                tjq("#formSearch #specificDestination").show();
                                tjq("#formSearch #specificDestination").attr(
                                    'placeholder',
                                    'Masukan nama jalan/tempat lebih spesifik di ' +
                                    ui.item.cityGeneralName + ' (opsional)');
                                tjq("#formSearch #specificDestination")
                                    .autocomplete({
                                        source: "https://jadwalbis.com/jadwal/ajaxSearchSpecificCity?parentId=" +
                                            parentId + "&cityCode=" + cityCode,
                                        minLength: 1,
                                        search: function() {
                                            tjq(this).addClass('working');
                                            tjq(this).next("input").val("");
                                        },
                                        open: function() {
                                            tjq(this).removeClass(
                                                'working');
                                        },
                                        response: function(event, ui) {
                                            tjq(this).removeClass(
                                                'working');
                                        },
                                        select: function(event, ui) {}
                                    });
                            } else {
                                tjq("#formSearch #specificDestination").hide();
                                tjq("#formSearch #specificDestination").val('');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }
            }
        });
        tjq("#formInput #source").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else tjq(this).next("input").val(ui.item.id);
            }
        });
        tjq("#formInput #destination").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else tjq(this).next("input").val(ui.item.id);
            }
        });
        tjq(".via").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchCity?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else tjq(this).next("input").val(ui.item.id);
            }
        });
        tjq("#busName").autocomplete({
            source: "https://jadwalbis.com/jadwal/ajaxSearchBus?groups=BUS",
            minLength: 1,
            search: function() {
                tjq(this).addClass('working');
            },
            open: function() {
                tjq(this).removeClass('working');
            },
            response: function(event, ui) {
                tjq(this).removeClass('working');
            },
            select: function(event, ui) {
                if (ui.item == null) tjq(this).next("input").val("");
                else tjq(this).next("input").val(ui.item.id);
            }
        });
        tjq(".searchB").on("mouseover", function() {
            tjq(this).addClass('warning');
        });
        tjq(".searchB").on("mouseleave", function() {
            tjq(this).removeClass('warning');
        });
        tjq("#switchCity").on("click", function() {
            var temp = tjq("#source").val();
            tjq("#source").val(tjq("#destination").val());
            tjq("#destination").val(temp);
            return false;
        });
        tjq("#formSearch").validate();
    })
</script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=1102679499867177';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script></script>

<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>
<!-- load JS files -->
<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
<!-- jQuery (https://jquery.com/download/) -->
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script> <!-- https://popper.js.org/ -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script> <!-- https://getbootstrap.com/ -->
<script src="<?php echo base_url('assets/js/datepicker.min.js') ?>"></script>
<!-- https://github.com/qodesmith/datepicker -->
<script src="<?php echo base_url('assets/js/jquery.singlePageNav.min.js') ?>"></script>
<!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>"></script>
<!-- http://kenwheeler.github.io/slick/ -->
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js') ?>"></script>
<!-- https://github.com/flesler/jquery.scrollTo -->