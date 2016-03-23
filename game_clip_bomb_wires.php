<?php
    session_start();


    if (empty($_SESSION['total'])) {
        $_SESSION['total'] = 0;
    }

    if( empty($_SESSION['highest_score'])){
        $_SESSION['highest_score'] = 0;
    }

    $blow_up = mt_rand(0, 3);
    $status = 'alive';

    if (isset($_POST['clipped'])) {
        if ($_POST['clipped'] != $blow_up) {
            $_SESSION['total']++;
        }

        if($_POST['clipped'] == $blow_up) {
            $_SESSION['total'] = 0;
            $status = 'dead';
        }

        if($_SESSION['highest_score']<$_SESSION['total']) {
            $_SESSION['highest_score'] = $_SESSION['total'];
        }



    }

    if(isset($_POST['reset'])){
        $_SESSION['highest_score'] = 0;
        $status = 'alive';
        $_SESSION['total'] = 0;
    }
?>

<p>
    It is your responsibility to deactivate all the bombs. Go!
</p>
<p>Your current status: <?php echo $status ?></p>
<form action="" method="post">
    <button type="submit" name="clipped" value="0">Yellow</button>
    <button type="submit" name="clipped" value="1">Blue</button>
</form>

<p>You have deactivated <?php echo $_SESSION["total"];?> bombs this life.</p>
<p>Most bombs you have deactivated before you died <?php echo $_SESSION['highest_score'];?></p>

<p>Blow Up <?php echo $blow_up;?></p>
<p>You chose <?php if(isset($_POST['clipped'])) {echo $_POST['clipped'];}?></p>

<form action="" method="post">
    <button type="submit" name="reset">Start Over</button>
</form>