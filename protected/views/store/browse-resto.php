<?php
$this->renderPartial('/front/default-header',array(
  'h1'=>t("Choose Location"),
  'sub_text'=>t("")
));
?>
<style>
    @media screen and (max-width: 768px){
        .mobile-banner{
            display: none;
        }
        #parallax-wrap{
            margin-top: 90px;
        }
    }
</style>
<div class="sections section-grey2 section-browse" id="section-browse">
  
 <div class="container">

    <div class="tabs-wrapper">
      <ul id="tabs">
		  <li class="<?php echo $tabs==1?"active":''?> noclick"  >
		    <a href="<?php echo Yii::app()->createUrl('/store/browse')?>">
		    <i class="ion-navigate"></i>
		     <span><?php echo t("Cannabis Locations")?></span>
		    </a>
		  </li>
      </ul>		    
      
      <ul id="tab">
          <li class="<?php echo $tabs==1?"active":''?>" >   
            <?php
            if ( $tabs==1):
	            if (is_array($list['list']) && count($list['list'])>=1){
		            $this->renderPartial('/front/browse-list',array(
					   'list'=>$list,
					   'tabs'=>$tabs
					));
	            } else echo '<p class="text-danger">'.t("No Cannabis found").'</p>';
            endif;
            ?>
          </li>
          <li class="<?php echo $tabs==2?"active":''?>" >
          <?php          
            if ( $tabs==2):
	            if (is_array($list['list']) && count($list['list'])>=1){
		            $this->renderPartial('/front/browse-list',array(
					   'list'=>$list,
					   'tabs'=>$tabs			   
					));
	            } else echo '<p class="text-danger">'.t("No Cannabis found").'</p>';
            endif;
            ?>
          </li>
          <li class="<?php echo $tabs==3?"active":''?>" >
          
          <?php          
            if ( $tabs==3):
	            if (is_array($list['list']) && count($list['list'])>=1){
		            $this->renderPartial('/front/browse-list',array(
					   'list'=>$list,
					   'tabs'=>$tabs
					));
	            } else echo '<p class="text-danger">'.t("No Cannabis found").'</p>';
            endif;
            ?>
          
          </li>
          
          <li>
            <div class="full-map-wrapper" >
               <div id="full-map"></div>
               <a href="javascript:;" class="view-full-map green-button"><?php echo t("View in fullscreen")?></a>
            </div> <!--full-map-->
          </li>          
      </ul>     
      
    </div> <!--tabs-wrapper-->
 
 </div><!-- container-->

</div> <!--sections-->