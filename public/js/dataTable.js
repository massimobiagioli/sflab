$(function() {
    var getDataTableConfig = function(dataTableId, $dataTable) {
        dataTableConfig = {
            crud: {
                "searching": true,
                "lengthChange": false,
                "info": false,
                "pageLength": $dataTable.data('pagelength'),
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class=\"fa fa-fast-backward fa-fw\"></i>",
                        "previous": "<i class=\"fa fa-step-backward fa-fw\"></i>",
                        "next": "<i class=\"fa fa-step-forward fa-fw\"></i>",
                        "last": "<i class=\"fa fa-fast-forward fa-fw\"></i>"
                    },
                    "emptyTable" : $dataTable.data('noresultsmsg')
                },
                "columnDefs": [
                    { "orderable": false, "targets": 3 },
                    { "width": "10%", "targets": 3 }
                ],
                "serverSide": true,
                ajax: {
                    url: $dataTable.data('url'),
                    type: 'POST'
                }
            }
        };
        return dataTableConfig[dataTableId];
    };
    
    var $dataTable = $('#crud_datatable');
    $dataTable.DataTable(getDataTableConfig('crud', $dataTable));
});