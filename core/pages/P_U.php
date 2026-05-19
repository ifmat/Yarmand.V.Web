<?php
require_once '../layout/session/session.php';
require_once '../layout/Html/StartHtml.php';
require_once '../layout/Head/Head.php';
$denied = [ 2,6];
if (in_array($_SESSION['level'], $denied)) {
    header("Location: error_404");
    if($_SESSION['level']==6){
        header("Location: error_maintenance");

    }
    exit;
}
?>
    <body>
    <?php
    require_once '../layout/Header/Header.php';
    require_once '../layout/Menu/Menu.php';
    ?>
    <div class="wrapper">
        <div id="loader"></div>
        <?php
        if ($_SESSION['level'] == 1) {
            require_once '../layout/P/Admin.php';
        } else {
            if ($_SESSION['level'] == 5) {
                require_once '../layout/P/Admin.php';
            } else {
                if ($_SESSION['level'] == 6) {
                    require_once '../layout/P/Admin.php';

                } else {
                    if ($_SESSION['level'] == 7) {
                        require_once '../layout/P/Admin.php';

                    } else {
                        if ($_SESSION['level'] == 4) {
                            require_once '../layout/P/Admin.php';

                        }
                    }
                }
            }

        }
        ?>
    </div>

    <?php
    require_once '../layout/Js/Js.php';
    ?>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>