<div class="uk-width-1">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/Inventory" class="uk-button"><i class="fa fa-list"></i> <?php echo Yii::t("default","List")?></a>
</div>

<div class="spacer"></div>

<div id="error-message-wrapper"></div>

<form class="uk-form uk-form-horizontal forms" id="forms">
<?php echo CHtml::hiddenField('action','editInventory')?>
<?php echo CHtml::hiddenField('id',isset($_GET['id'])?$_GET['id']:"");?>

<?php 
if (isset($_GET['id'])){
	if (!$data=Yii::app()->functions->getItemById($_GET['id'])[0]){
		echo "<div class=\"uk-alert uk-alert-danger\">".
		Yii::t("default","Sorry but we cannot find what your are looking for.")."</div>";
		return ;
	}
}
?>  

	    
<div class="spacer"></div>

<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Item Name")?></label>
  <?php echo CHtml::textField('item_name',
  isset($data['item_name'])?$data['item_name']:""
  ,array(
  'class'=>'uk-form-width-large',
  'data-validation'=>"required"
  ))?>
</div>
<div class="uk-form-row">
  <label class="uk-form-label"><?php echo Yii::t("default","Quantity")?></label>
  <?php echo CHtml::textField('quantity',
  isset($data['quantity'])?$data['quantity']:""
  ,array(
  'class'=>'uk-form-width-large',
  'data-validation'=>"required"
  ))?>
</div>

<div class="uk-form-row">
<label class="uk-form-label"></label>
<input type="submit" value="<?php echo Yii::t("default","Save")?>" class="uk-button uk-form-width-medium uk-button-success">
<a href="<?php echo Yii::app()->request->baseUrl; ?>/merchant/Inventory" class="uk-button uk-form-width-medium uk-button-default"><?php echo Yii::t("default","Cancel")?></a>
</div>

</form>