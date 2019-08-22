
<div class="result-merchant infinite-container" id="restuarant-list">
<?php foreach ($list['list'] as $val):?>
<?php
$merchant_id=$val['merchant_id'];
$ratings=Yii::app()->functions->getRatings($merchant_id);   
$merchant_delivery_distance=getOption($merchant_id,'merchant_delivery_miles');
$distance_type='';
$distance_type=FunctionsV3::getMerchantDistanceType($merchant_id); 
$distance_type = $distance_type=="M"?t("miles"):t("kilometers");

/*fallback*/
if ( empty($val['latitude'])){
	if ($lat_res=Yii::app()->functions->geodecodeAddress($val['merchant_address'])){        
		$val['latitude']=$lat_res['lat'];
		$val['lontitude']=$lat_res['long'];
	} 
}
?>
<div class="infinite-item">
   <div class="inner">
   
   <?php if ( $val['is_sponsored']==2):?>
       <div class="ribbon"><span><?php echo t("Sponsored")?></span></div>
    <?php endif;?>
    
    <?php if ($offer=FunctionsV3::getOffersByMerchant($merchant_id)):?>
       <div class="ribbon-offer"><span><?php echo $offer;?></span></div>
    <?php endif;?>
   
     <div class="row"> 
        <div class="col-md-6 borderx">
        
         <div class="row borderx" style="padding: 10px;padding-bottom:0;">
             
		     <div class="col-md-9 borderx">
		    
		     <div class="mytable">         		         
		         
		         <div class="mycol">
		            <a href="javascript:;" data-id="<?php echo $val['merchant_id']?>"  title="<?php echo t("add to your favorite restaurant")?>" class="add_favorites <?php echo "fav_".$val['merchant_id']?>"></a>
		         </div>		         		         		         
		         
		      </div> <!--mytable-->
	       
		      <h2><?php echo clearString($val['restaurant_name'])?></h2>
	          <p class="merchant-address concat-text"><?php echo $val['merchant_address']?></p>   
	          
	          
		        <a href="<?php echo Yii::app()->createUrl("/menu-". trim($val['restaurant_slug']))?>" 
		        class="orange-button rounded3 medium bottom10 inline-block">
		        <?php echo t("View menu")?>
		        </a>
		                      
		     </div> <!--col-->
         </div> <!--row-->         
         
        </div> <!--col-->
     </div> <!--row-->
   </div> <!--inner-->
</div> <!--infinite-item-->
<?php endforeach;?>
</div> <!--result-merchant-->

<div class="search-result-loader">
    <i></i>
    <p><?php echo t("Loading more restaurant...")?></p>
 </div> <!--search-result-loader-->

<?php             
if (isset($cuisine_page)){
	//$page_link=Yii::app()->createUrl('store/cuisine/'.$category.'/?');
	$page_link=Yii::app()->createUrl('store/cuisine/?category='.urlencode($_GET['category']));
} else $page_link=Yii::app()->createUrl('store/browse/?tab='.$tabs);

 echo CHtml::hiddenField('current_page_url',$page_link);
 require_once('pagination.class.php'); 
 $attributes                 =   array();
 $attributes['wrapper']      =   array('id'=>'pagination','class'=>'pagination');			 
 $options                    =   array();
 $options['attributes']      =   $attributes;
 $options['items_per_page']  =   FunctionsV3::getPerPage();
 $options['maxpages']        =   1;
 $options['jumpers']=false;
 $options['link_url']=$page_link.'&page=##ID##';			
 $pagination =   new pagination( $list['total'] ,((isset($_GET['page'])) ? $_GET['page']:1),$options);		
 $data   =   $pagination->render();
 ?>             