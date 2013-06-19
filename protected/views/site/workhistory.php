<?php
    /* @var $this SiteController */
    /* @var $model LinkedIn */

    $this->pageTitle= 'About me - '.Yii::app()->name ;
    ?>
<h1>About me</h1>

<p>I'm an ambitious guy striving for perfection, I like learning and trying new things. I don't mind being bad at cooking for example, but my code has to be flawless. I spend a lot of time refactoring and I really enjoy my work. </p>
<p>I've being in love with programming since I was a kid and my dad bought us a computer. I participated in and won several programming competitions in school, I was really into Visual Basic and Delphi those days. In university I skipped a lot of classes but I always did my programming assignments. I learnt Java, C++ and Assembler there.</p>
<p>I started working when I was still getting my education, my first employer gave me a great training in WordPress, and since then Web technologies became my thing.</p>
<p>Almost three years later I felt like I was perfect because the tasks were easy and I did them flawlessly. Then a really great guy, that helped me a lot in the beginning, left my employer for another IT company and I tried following him, but failed the interview. It turned out I wasn't as perfect as I thought. </p>
<p>I had to change my job position if I wanted to improve, so I did, and I haven't regreted it since. The new place was great, the tasks were difficult and I felt improvement. But all projects were on Magento and it started to get boring. The main reason I left and joined DataArt though was the security, I really felt confident in such a big company and the promised bonuses were great. </p>
<p>So DataArt is my current employer and I enjoy everything here.</p>

<h3>My work history</h3>
<?php if(Yii::app()->user->hasFlash('positions')): ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('positions'),
    )); ?>

<?php elseif(!Yii::app()->user->isGuest): ?>

<?php echo CHtml::link('Update work history', $this->createUrl('/site/workhistory',array('update'=>1))) ?>

<?php endif?>
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