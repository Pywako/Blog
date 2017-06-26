<?php
/**
 * pagination
 */
?>
<p class="page" >Page(s) :
    <?php
    for($i=1; $i<=$nbPage; $i++)
    {
        if($i == $pageActuelle)
        {
            echo '<span style="color:grey;"> '. $i .' </span>';
        }
        else
        {
            echo ' <a href="' . $url . $i . '"> ' . $i . ' </a>';
        }
    }
    ?>
</p>