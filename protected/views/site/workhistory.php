<?php
    /* @var $this SiteController */
    /* @var $model LinkedIn */

    $this->pageTitle= 'About me - '.Yii::app()->name ;
    ?>
<h1>About me</h1>

<p>I've been developing programs since school and I've always enjoyed it. You can find more info on technologies that I use at my <a href="http://ua.linkedin.com/pub/vladimir-feskov/54/498/297" target="_blank">Linkedin</a> profile.</p>

<h3>My work history</h3>

<ol class="positions-list">
<?php $positions = array();

foreach($dataProvider->getData() as $position)
{
    $dates = date('F Y',strtotime($position->startdate));
    if($position->enddate) $dates .= ' - '. date('F Y',strtotime($position->enddate));
    else $dates .= ' - Present';
    echo '<li>';
    echo '<p>';
    echo "<span class=\"position\">$position->title at ";
    echo "<a href=\"$position->companyurl\" target=\"_blank\">$position->companyname</a></span><br/>";
    echo "<span class=\"dates\">$dates</span><br/>";
    echo "<span class=\"summary\">$position->summary</span>";
    echo '</p>';
    echo '</li>';
}
?>
</ol>
