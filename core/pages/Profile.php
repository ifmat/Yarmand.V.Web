<?php
require_once '../layout/session/session.php';
require_once '../layout/Html/StartHtml.php';
require_once '../layout/Head/Head.php';
require_once '../db/Connect.php';

$denied = [2, 6];
if (in_array($_SESSION['level'], $denied)) {
    header("Location: error_404");
    if ($_SESSION['level'] == 6) {
        header("Location: error_maintenance");

    }
    exit;
}
?>
    <body>
    <div class="row">

        <?php
        require_once '../layout/Header/Header.php';
        require_once '../layout/Menu/Menu.php';
        ?>

    <?php
        $UserId = $_SESSION['user_id'];

        if ($_SESSION['level'] == 0) {
            require_once '../layout/U/Super_Admin.php';
        } else {
            if ($_SESSION['level'] == 1) {
                require_once '../layout/U/Admin.php';
            } else {
                if ($_SESSION['level'] == 3) {
                    require_once '../layout/U/Yarjo.php';
                } else {
                    if ($_SESSION['level'] == 4) {
                        require_once '../layout/U/Yavar.php';
                    } else {
                        if ($_SESSION['level'] == 5) {
                            require_once '../layout/U/Camp_Yarjo.php';
                        } else {
                            if ($_SESSION['level'] == 6) {
                                header("Location: error_404");

                            }
                        }
                    }
                }
            }

        }
        ?>

    <?php
    require_once '../layout/Js/Js.php';
    ?>
    </body>
<?php
require_once '../layout/Html/EndHtml.php';
?>