<div class="wrap">
    <h1>** DOMDevs OOP Reservation Plugin Settings **</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">General</a></li>
        <li><a href="#tab-2">Reservation</a></li>
        <li><a href="#tab-3">Emails</a></li>
    </ul>

    <div class="tab-content">

        <div id="#tab-1" class="tab-pane active">
            <form action="options.php" method="POST">
                <?php
                    settings_fields( 'general_settings' ); // from option group
                    do_settings_sections( 'dd_oop_reservation' );
                    submit_button();
                ?>
            </form>
        </div>

        <div id="#tab-2" class="tab-pane">
            <h3>Reservation schedule and exceptions</h3>
        </div>

        <div id="#tab-3" class="tab-pane">
            <h3>Email notifications</h3>
        </div>

    </div>

    
</div>