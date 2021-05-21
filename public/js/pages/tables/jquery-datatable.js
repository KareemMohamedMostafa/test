$(function () {

    $('.js-basic-example').DataTable();

    $('.js-exportable').DataTable({ dom: 'Bfrtip', buttons: ['copy', 'csv', 'excel', 'pdf', 'print'] });

});