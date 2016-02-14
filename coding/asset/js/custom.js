/**
 * Created by huzaifa on 2/7/2016.
 */
$(document).ready(function(){

    $('.date').datepicker({
        format: "dd M yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $('#unapprovetable').dataTable({
        stateSave: true
    });
    $('#kafeeltable').dataTable({
        stateSave: true
    });
    $('#localtable').dataTable({
        stateSave: true
    });
    $('#privilagetable').dataTable({
        stateSave: true
    });

    $('#iqama_professions').dataTable({
        stateSave: true
    });
});

