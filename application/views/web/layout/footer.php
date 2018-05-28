    <!-- Modal -->
<!-- Modal -->
  <div class="modal fade" id="myModalTest" role="dialog">
    <div class="modal-dialog">
     
      <div class="modal-content">

        </div>
    </div>
</div>

<script type="text/javascript">
    $('body').on('hidden.bs.modal', '.modal', function() {
        $(this).removeData('bs.modal');
        $(this).find('.modal-content').html('<div style="text-align: center;"></div>');
    });
</script>

  <!-- END OF RIGHT SLIDER CONTENT-->
    <script src="<?php echo ASSET_URL; ?>assets/js/progress-bar/src/jquery.velocity.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>assets/js/progress-bar/number-pb.js"></script>
    <script src="<?php echo ASSET_URL; ?>assets/js/progress-bar/progress-app.js"></script>



    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/preloader.js"></script>
  <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/app.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/load.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/main.js"></script>



    <!-- GAGE -->


    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/chart/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/chart/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/chart/realTime.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/speed/canvasgauge-coustom.js"></script>
    <script type="text/javascript" src="<?php echo ASSET_URL; ?>assets/js/countdown/jquery.countdown.js"></script>
   
     <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.validate.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-notify.min.js"></script>


    <script src="<?php echo ASSET_URL; ?>assets/js/jhere-custom.js"></script>

    <script>
        try {
            var gauge4 = new Gauge("canvas4", {
                'mode': 'needle',
                'range': {
                    'min': 0,
                    'max': 90
                }
            });
            gauge4.draw(Math.floor(Math.random() * 90));
            var run = setInterval(function() {
                gauge4.draw(Math.floor(Math.random() * 90));
            }, 3500);
        } catch(e) {}
    </script>


    <script type="text/javascript">
    /* Javascript
     *
     * See http://jhere.net/docs.html for full documentation
     */
    $(window).on('load', function() {
        $('#mapContainer').jHERE({
            center: [52.500556, 13.398889],
            type: 'smart',
            zoom: 10
        }).jHERE('marker', [52.500556, 13.338889], {
            icon: 'assets/img/marker.png',
            anchor: {
                x: 12,
                y: 32
            },
            click: function() {
                alert('Hallo from Berlin!');
            }
        })
            .jHERE('route', [52.711, 13.011], [52.514, 13.453], {
                color: '#FFA200',
                marker: {
                    fill: '#86c440',
                    text: '#'
                }
            });
    });
    </script>
    <script type="text/javascript">
    var output, started, duration, desired;

    // Constants
    duration = 5000;
    desired = '50';

    // Initial setup
    output = $('#speed');
    started = new Date().getTime();

    // Animate!
    animationTimer = setInterval(function() {
        // If the value is what we want, stop animating
        // or if the duration has been exceeded, stop animating
        if (output.text().trim() === desired || new Date().getTime() - started > duration) {
            console.log('animating');
            // Generate a random string to use for the next animation step
            output.text('' + Math.floor(Math.random() * 60)

            );

        } else {
            console.log('animating');
            // Generate a random string to use for the next animation step
            output.text('' + Math.floor(Math.random() * 120)

            );
        }
    }, 5000);
    </script>
    <script type="text/javascript">
    $('#getting-started').countdown('2015/01/01', function(event) {
        $(this).html(event.strftime(

            '<span>%M</span>' + '<span class="start-min">:</span>' + '<span class="start-min">%S</span>'));
    });
    </script>

<style type="text/css">
    .side-dash{ display:none !important; } #nt-title-container{ display: none !important;}
</style>