/* ------------------------------------------------------------------------------
 *
 *  # Columns Visibility (Buttons) extension for Datatables
 *
 *  Demo JS code for datatable_extension_colvis.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

const DatatableColumnVisibility = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    const _componentDatatableColumnVisibility = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header justify-content-start"f<"ms-sm-auto"l><"ms-sm-3"B>><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span class="me-3">Filitre:</span> <div class="form-control-feedback form-control-feedback-end flex-fill">_INPUT_<div class="form-control-feedback-icon"><i class="ph-magnifying-glass opacity-50"></i></div></div>',
                searchPlaceholder: 'Arama Yap',
                lengthMenu: '<span class="me-3">Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': document.dir == "rtl" ? '&larr;' : '&rarr;', 'previous': document.dir == "rtl" ? '&rarr;' : '&larr;' }
            }
        });


        // Basic example
        $('.datatable-colvis-basic').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    className: 'btn btn-light dropdown-toggle'
                }
            ]
        });

        $('.datatable-colvis-gider').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-squares-four"></i> Kolonları Göster',
                    className: 'btn btn-teal btn-icon dropdown-toggle',
                    postfixButtons: [ 'colvisRestore' ],
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel Aktar <i class="ph-file-xls ms-2"></i>',
                    className: 'btn btn-light',
                    autoFilter: true,
                    sheetName: 'Exported data'
                }
            ],
            columnDefs: [
                {
                    targets: -9,
                    visible: false
                },
                {
                    targets: -8,
                    visible: false
                },
                {
                    targets: -7,
                    visible: false
                },
                {
                    targets: -6,
                    visible: false
                },
                {
                    targets: -5,
                    visible: false
                },
                {
                    targets: -4,
                    visible: false
                },{
                    targets: -3,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                },
                {
                    targets: -1,
                    visible: false
                }
            ],
        });
        $('.datatable-colvis-oran').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-squares-four"></i> Kolonları Göster',
                    className: 'btn btn-teal btn-icon dropdown-toggle',
                    postfixButtons: [ 'colvisRestore' ],
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel Aktar <i class="ph-file-xls ms-2"></i>',
                    className: 'btn btn-light',
                    autoFilter: true,
                    sheetName: 'Exported data'
                }
            ],
            columnDefs: [
                {
                    targets: -9,
                    visible: false
                },
                {
                    targets: -8,
                    visible: false
                },
                {
                    targets: -7,
                    visible: false
                },
                {
                    targets: -6,
                    visible: false
                },
                {
                    targets: -5,
                    visible: false
                },
                {
                    targets: -4,
                    visible: false
                },
                {
                    targets: -3,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                },
                {
                    targets: -1,
                    visible: false
                },
            ],
        });



        // Multi-column layout
        $('.datatable-colvis-multi').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-list"></i>',
                    className: 'btn btn-primary btn-icon dropdown-toggle',
                    collectionLayout: 'fixed two-column'
                }
            ],

        });


        // Restore column visibility
        $('.datatable-colvis-restore').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-squares-four"></i> Kolonları Göster',
                    className: 'btn btn-teal btn-icon dropdown-toggle',
                    postfixButtons: [ 'colvisRestore' ],
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel Aktar <i class="ph-file-xls ms-2"></i>',
                    className: 'btn btn-light',
                    autoFilter: true,
                    sheetName: 'Exported data'
                }
            ],
            columnDefs: [
                {
                    targets: -9,
                    visible: false
                },
                {
                    targets: -8,
                    visible: false
                },
                {
                    targets: -7,
                    visible: false
                },
                {
                    targets: -6,
                    visible: false
                },
                {
                    targets: -5,
                    visible: false
                },
                {
                    targets: -4,
                    visible: false
                },{
                    targets: -3,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                },
                {
                    targets: -1,
                    visible: false
                }
            ],
           footerCallback: function (row, data, start, end, display) {


            },
        });
        $('.datatable-colvis-restore2').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-squares-four"></i> Kolonları Göster',
                    className: 'btn btn-teal btn-icon dropdown-toggle',
                    postfixButtons: [ 'colvisRestore' ],
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel Aktar <i class="ph-file-xls ms-2"></i>',
                    className: 'btn btn-light',
                    autoFilter: true,
                    sheetName: 'Exported data'
                }
            ],
            columnDefs: [
                {
                    targets: -9,
                    visible: false
                },
                {
                    targets: -8,
                    visible: false
                },
                {
                    targets: -7,
                    visible: false
                },
                {
                    targets: -6,
                    visible: false
                },
                {
                    targets: -5,
                    visible: false
                },
                {
                    targets: -4,
                    visible: false
                },{
                    targets: -3,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                },
                {
                    targets: -1,
                    visible: false
                }
            ],
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };

                // Total over all pages
                total = api
                    .column(4)
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                ocak = api
                    .column(5, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                subat = api
                    .column(6, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                mart = api
                    .column(7, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                nisan = api
                    .column(8, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                mayis = api
                    .column(9, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                haziran = api
                    .column(10, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                temmuz = api
                    .column(11, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                agustos = api
                    .column(12, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                eylul = api
                    .column(13, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                ekim = api
                    .column(14, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                kasim = api
                    .column(15, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                aralik = api
                    .column(16, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html('Toplam');
                $(api.column(4).footer()).html('' + total );
                $(api.column(5).footer()).html('' + ocak );
                $(api.column(6).footer()).html('' + subat );
                $(api.column(7).footer()).html('' + mart );
                $(api.column(8).footer()).html('' + nisan );
                $(api.column(9).footer()).html('' + mayis );
                $(api.column(10).footer()).html('' + haziran );
                $(api.column(11).footer()).html('' + temmuz );
                $(api.column(12).footer()).html('' + agustos );
                $(api.column(13).footer()).html('' + eylul );
                $(api.column(14).footer()).html('' + ekim );
                $(api.column(15).footer()).html('' + kasim );
                $(api.column(16).footer()).html('' + aralik );
            },
        });


        // State saving
        $('.datatable-colvis-state').DataTable({
            buttons: [
                {
                    extend: 'colvis',
                    text: '<i class="ph-squares-four"></i>',
                    className: 'btn btn-indigo btn-icon dropdown-toggle'
                }
            ],
            stateSave: true,
            columnDefs: [
                {
                    targets: -1,
                    visible: false
                }
            ]
        });


        // Column groups
        $('.datatable-colvis-group').DataTable({
            buttons: {
                buttons: [
                    {
                        extend: 'colvisGroup',
                        text: 'Sadece Farklar',
                        className: 'btn btn-light',
                        show: [7,10,13,16,19,22,25,28,31,34,37,40],
                        hide: [5,6,8,9,11,12,14,15,17,18,20,21,23,24,26,27,29,30,32,33,35,36,38,39]
                    },
                    {
                        extend: 'colvisGroup',
                        text: 'OCAK - MART',
                        className: 'btn btn-light',
                        show: [5,6,7,8,9,10,11,12,13],
                        hide: [14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Nisan - Haziran',
                        show: [14, 15, 16,17,18,19,20,21,22],
                        hide: [5,6,7,8,9,10,11,12,13,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Temmuz - Eylül',
                        show: [23,24,25,26,27,28,29,30,31],
                        hide: [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,32,33,34,35,36,37,38,39,40]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Ekim - Aralık',
                        show: [32, 33, 34,35,36,37,38,39,40],
                        hide: [5,6,7,8,9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Tümü',
                        show: ':hidden'
                    }
                ]
            }
        });

        $('.datatable-colvis-gider2').DataTable({
            buttons: {
                buttons: [
                    {
                        extend: 'colvisGroup',
                        text: 'OCAK - MART',
                        className: 'btn btn-light',
                        show: [4,5,6,7,8,9,10,11,12],
                        hide: [13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Nisan - Haziran',
                        show: [13, 14, 15,16,17,18,19,20,21],
                        hide: [4,5,6,7,8,9,10,11,12,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Temmuz - Eylül',
                        show: [22,23,24,25,26,27,28,29,30],
                        hide: [4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,31,32,33,34,35,36,37,38,39]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Ekim - Aralık',
                        show: [31,32, 33, 34,35,36,37,38,39],
                        hide: [4,5,6,7,8,9,10, 11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]
                    },
                    {
                        extend: 'colvisGroup',
                        className: 'btn btn-light',
                        text: 'Tümü',
                        show: ':hidden'
                    }
                ]

            },
            columnDefs: [
                {
                    targets: -27,
                    visible: false
                },
                {
                    targets: -26,
                    visible: false
                },
                {
                    targets: -25,
                    visible: false
                },
                {
                    targets: -24,
                    visible: false
                },
                {
                    targets: -23,
                    visible: false
                },
                {
                    targets: -22,
                    visible: false
                },
                {
                    targets: -21,
                    visible: false
                },
                {
                    targets: -20,
                    visible: false
                },
                {
                    targets: -19,
                    visible: false
                },
                {
                    targets: -18,
                    visible: false
                },
                {
                    targets: -17,
                    visible: false
                },
                {
                    targets: -16,
                    visible: false
                },
                {
                    targets: -15,
                    visible: false
                },
                {
                    targets: -14,
                    visible: false
                },
                {
                    targets: -13,
                    visible: false
                },
                {
                    targets: -12,
                    visible: false
                },
                {
                    targets: -11,
                    visible: false
                },
                {
                    targets: -10,
                    visible: false
                },
                {
                    targets: -9,
                    visible: false
                },
                {
                    targets: -8,
                    visible: false
                },
                {
                    targets: -7,
                    visible: false
                },
                {
                    targets: -6,
                    visible: false
                },
                {
                    targets: -5,
                    visible: false
                },
                {
                    targets: -4,
                    visible: false
                },{
                    targets: -3,
                    visible: false
                },
                {
                    targets: -2,
                    visible: false
                },
                {
                    targets: -1,
                    visible: false
                }
            ]
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableColumnVisibility();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableColumnVisibility.init();
});
