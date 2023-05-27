    
    
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    
    <script src="backend/template/vendors/jquery/dist/jquery.min.js"></script>
    <script src="backend/template/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="backend/template/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="backend/template/assets/js/main.js"></script>


    <script src="backend/template/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="backend/template/assets/js/dashboard.js"></script>
    <script src="backend/template/assets/js/widgets.js"></script>
    <script src="backend/template/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="backend/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="backend/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
            
            // auto set input type date to today date
            var now = new Date();
            var month = (now.getMonth() + 1);               
            var day = now.getDate();
            if (month < 10) 
                month = "0" + month;
            if (day < 10) 
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            jQuery('input[type=date]').each(function() {
                var v = $(this).val();
                if (v == '')
                    $(this).val(today)
            });
        })(jQuery);
    </script>

</body>

</html>