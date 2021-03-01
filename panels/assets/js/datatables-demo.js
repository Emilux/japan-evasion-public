// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json'
        }
    });
    $('#dataTable-coms').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json'
        }
    });
    $('#dataTable-articles').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json',

        },
    });
    $('#dataTable-page-articles').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json',

        },
        pageLength: 50
    });

});