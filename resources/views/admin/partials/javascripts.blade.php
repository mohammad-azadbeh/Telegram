<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
{{--<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>--}}
{{--<script src="{{ url('quickadmin/js') }}/timepicker.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>--}}




<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>
<script src="{{ url('lib/jdatepicker/') }}/bootstrap-datepicker.min.js"></script>
<script src="{{ url('lib/jdatepicker/') }}/bootstrap-datepicker.fa.min.js"></script>
<script src="{{ url('vendor/highcharts/') }}/highcharts.js"></script>
<script src="{{ url('vendor/highcharts/') }}/highcharts-more.js"></script>
<script src="{{ url('vendor/highcharts/modules/') }}/solid-gauge.js"></script>
{{--<script src="{{ url('vendor/highcharts/themes/') }}/dark-blue.js"></script>--}}
<script src="{{ url('quickadmin/js') }}/chart.js"></script>
<script src="{{ url('quickadmin/js') }}/main.js"></script>

<script>

    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: "{{ config('quickadmin.date_format_jquery') }}"
    });



</script>
