<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('title'); ?>
    Admin Özet
<?php $this->endSection() ?>

<?php $this->section('content'); ?>
    <!-- Page header -->
    <div class="page-header page-header-light shadow">
        <div class="page-header-content d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Admin - <span class="fw-normal">Ana Sayfa</span>
                </h4>

                <a href="#page_header"
                   class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                   data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>

        <div class="page-header-content d-lg-flex border-top">
            <div class="d-flex">
                <div class="breadcrumb py-2">
                    <a href="index.html" class="breadcrumb-item"><i class="ph-house"></i></a>
                    <a href="#" class="breadcrumb-item">Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#breadcrumb_elements"
                   class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                   data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>


        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Gelir / Gider </h5>
            </div>


            <div class="card-body">
                <div class="row">
                    <?php

                    $yurticigelirtoplam = 0;

                    while ($row = oci_fetch_array($yurtici, OCI_BOTH)) {
                        $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                        $yurticigelirtoplam += (float)$row['OCAK_TUTAR']
                            + (float)$row['SUBAT_TUTAR']
                            + (float)$row['MART_TUTAR']
                            + (float)$row['NISAN_TUTAR']
                            + (float)$row['MAYIS_TUTAR']
                            + (float)$row['HAZIRAN_TUTAR']
                            + (float)$row['TEMMUZ_TUTAR']
                            + (float)$row['AGUSTOS_TUTAR']
                            + (float)$row['EYLUL_TUTAR']
                            + (float)$row['EKIM_TUTAR']
                            + (float)$row['KASIM_TUTAR']
                            + (float)$row['ARALIK_TUTAR'];
                    }
                    ?>
                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-primary text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($yurticigelirtoplam, 2) ?></h4>
                                    Yurtiçi Gelir Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <?php

                    $yurtdisigelirtoplam = 0;

                    while ($row2 = oci_fetch_array($yurtdisi, OCI_BOTH)) {
                        $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                        $yurtdisigelirtoplam += (float)$row2['OCAK_TUTAR']
                            + (float)$row2['SUBAT_TUTAR']
                            + (float)$row2['MART_TUTAR']
                            + (float)$row2['NISAN_TUTAR']
                            + (float)$row2['MAYIS_TUTAR']
                            + (float)$row2['HAZIRAN_TUTAR']
                            + (float)$row2['TEMMUZ_TUTAR']
                            + (float)$row2['AGUSTOS_TUTAR']
                            + (float)$row2['EYLUL_TUTAR']
                            + (float)$row2['EKIM_TUTAR']
                            + (float)$row2['KASIM_TUTAR']
                            + (float)$row2['ARALIK_TUTAR'];
                    }
                    ?>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-success text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($yurtdisigelirtoplam, 2) ?></h4>
                                    Yurtdışı Gelir Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-dark text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($yurticigelirtoplam+$yurtdisigelirtoplam, 2) ?></h4>
                                    Genel Gelir Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <?php

                    $gidertoplam = 0;

                    while ($row3 = oci_fetch_array($gider, OCI_BOTH)) {
                        $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                        $gidertoplam += (float)$row3['OCAK_TUTAR']
                            + (float)$row3['SUBAT_TUTAR']
                            + (float)$row3['MART_TUTAR']
                            + (float)$row3['NISAN_TUTAR']
                            + (float)$row3['MAYIS_TUTAR']
                            + (float)$row3['HAZIRAN_TUTAR']
                            + (float)$row3['TEMMUZ_TUTAR']
                            + (float)$row3['AGUSTOS_TUTAR']
                            + (float)$row3['EYLUL_TUTAR']
                            + (float)$row3['EKIM_TUTAR']
                            + (float)$row3['KASIM_TUTAR']
                            + (float)$row3['ARALIK_TUTAR'];
                    }
                    ?>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-danger text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($gidertoplam, 2) ?></h4>
                                    Gider Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <?php

                    $hammadetoplam = 0;

                    while ($row4 = oci_fetch_array($hammade, OCI_BOTH)) {
                        $fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
                        $hammadetoplam += (float)$row4['OCAK_TUTAR']
                            + (float)$row4['SUBAT_TUTAR']
                            + (float)$row4['MART_TUTAR']
                            + (float)$row4['NISAN_TUTAR']
                            + (float)$row4['MAYIS_TUTAR']
                            + (float)$row4['HAZIRAN_TUTAR']
                            + (float)$row4['TEMMUZ_TUTAR']
                            + (float)$row4['AGUSTOS_TUTAR']
                            + (float)$row4['EYLUL_TUTAR']
                            + (float)$row4['EKIM_TUTAR']
                            + (float)$row4['KASIM_TUTAR']
                            + (float)$row4['ARALIK_TUTAR'];
                    }
                    ?>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-info text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($hammadetoplam, 2) ?></h4>
                                    Hammade Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-dark text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($gidertoplam+$hammadetoplam, 2) ?></h4>
                                    Genel Gider Toplam
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="card card-body bg-warning text-white">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <h4 class="mb-0"><?= "€ " . number_format($yurticigelirtoplam+$yurtdisigelirtoplam-$gidertoplam-$hammadetoplam, 2) ?></h4>
                                    Toplam Kar/Zarar
                                </div>

                                <i class="ph-plus ph-2x opacity-75 ms-3"></i>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--<div class="card">
            <div class="card-header">
                <h5 class="mb-0">Grafiksel</h5>
            </div>

            <div class="card-body">
                <div class="chart-container">
                    <div class="chart has-fixed-height" id="area_basic"></div>
                </div>
            </div>
        </div>
-->



    </div>
    <!-- /content area -->
<?php $this->endSection(); ?>

<?php $this->section('js') ?>
<!-- Theme JS files -->
<?= script_tag('public/admin/assets/js/vendor/visualization/echarts/echarts.min.js') ?>
<script>


    /* ------------------------------------------------------------------------------
 *
 *  # Echarts - Basic area chart example
 *
 *  Demo JS code for basic area chart [light theme]
 *
 * ---------------------------------------------------------------------------- */


    // Setup module
    // ------------------------------

    var EchartsAreaBasicLight = function() {


        //
        // Setup module components
        //

        // Basic area chart
        var _areaBasicLightExample = function() {
            if (typeof echarts == 'undefined') {
                console.warn('Warning - echarts.min.js is not loaded.');
                return;
            }

            // Define element
            var area_basic_element = document.getElementById('area_basic');


            //
            // Charts configuration
            //

            if (area_basic_element) {

                // Initialize chart
                var area_basic = echarts.init(area_basic_element, null, { renderer: 'svg' });


                //
                // Chart config
                //

                // Options
                area_basic.setOption({

                    // Define colors
                    color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                    // Global text styles
                    textStyle: {
                        fontFamily: 'var(--body-font-family)',
                        color: 'var(--body-color)',
                        fontSize: 14,
                        lineHeight: 22,
                        textBorderColor: 'transparent'
                    },

                    // Chart animation duration
                    animationDuration: 750,

                    // Setup grid
                    grid: {
                        left: 0,
                        right: 40,
                        top: 35,
                        bottom: 5,
                        containLabel: true
                    },

                    // Add legend
                    legend: {
                        data: ['Yurt İçi Gelir Toplam', 'In progress', 'Closed deals'],
                        itemHeight: 8,
                        itemGap: 30,
                        textStyle: {
                            color: 'var(--body-color)'
                        }
                    },

                    // Add tooltip
                    tooltip: {
                        trigger: 'axis',
                        className: 'shadow-sm rounded',
                        backgroundColor: 'var(--white)',
                        borderColor: 'var(--gray-400)',
                        padding: 15,
                        textStyle: {
                            color: '#000'
                        }
                    },

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        boundaryGap: false,
                        data: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                        axisLabel: {
                            color: 'rgba(var(--body-color-rgb), .65)'
                        },
                        axisLine: {
                            lineStyle: {
                                color: 'var(--gray-500)'
                            }
                        },
                        splitLine: {
                            show: true,
                            lineStyle: {
                                color: 'var(--gray-300)',
                                type: 'dashed'
                            }
                        }
                    }],

                    // Vertical axis
                    yAxis: [{
                        type: 'value',
                        axisLabel: {
                            color: 'rgba(var(--body-color-rgb), .65)'
                        },
                        axisLine: {
                            show: true,
                            lineStyle: {
                                color: 'var(--gray-500)'
                            }
                        },
                        splitLine: {
                            lineStyle: {
                                color: 'var(--gray-300)'
                            }
                        },
                        splitArea: {
                            show: true,
                            areaStyle: {
                                color: ['rgba(var(--white-rgb), .01)', 'rgba(var(--black-rgb), .01)']
                            }
                        }
                    }],

                    // Axis pointer
                    axisPointer: [{
                        lineStyle: {
                            color: 'var(--gray-600)'
                        }
                    }],

                    // Add series
                    series: [
                        {
                            name: 'Closed deals',
                            type: 'line',
                            data: [<?= $yurticigelirtoplam ?>],
                            areaStyle: {
                                normal: {
                                    opacity: 0.25
                                }
                            },
                            smooth: true,
                            symbol: 'circle',
                            symbolSize: 8,
                        },
                        {
                            name: 'In progress',
                            type: 'line',
                            smooth: true,
                            symbol: 'circle',
                            symbolSize: 8,
                            areaStyle: {
                                normal: {
                                    opacity: 0.25
                                }
                            },
                            data: [30, 182, 434, 791, 390, 30, 10]
                        },
                        {
                            name: 'New orders',
                            type: 'line',
                            smooth: true,
                            symbol: 'circle',
                            symbolSize: 8,
                            areaStyle: {
                                normal: {
                                    opacity: 0.25
                                }
                            },
                            data: [1320, 1132, 601, 234, 120, 90, 20]
                        }
                    ]
                });
            }


            //
            // Resize charts
            //

            // Resize function
            var triggerChartResize = function() {
                area_basic_element && area_basic.resize();
            };

            // On sidebar width change
            var sidebarToggle = document.querySelectorAll('.sidebar-control');
            if (sidebarToggle) {
                sidebarToggle.forEach(function(togglers) {
                    togglers.addEventListener('click', triggerChartResize);
                });
            }

            // On window resize
            var resizeCharts;
            window.addEventListener('resize', function() {
                clearTimeout(resizeCharts);
                resizeCharts = setTimeout(function () {
                    triggerChartResize();
                }, 200);
            });
        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _areaBasicLightExample();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        EchartsAreaBasicLight.init();
    });


</script>
<?php $this->endSection(); ?>
