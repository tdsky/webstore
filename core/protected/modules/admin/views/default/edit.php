<div class="span9">
    <div class="hero-unit">
        <h3><?php echo $this->editSectionName; ?></h3>
        <div class="editinstructions"><?php echo $this->editSectionInstructions; ?></div>
		    <?php echo CHtml::beginForm(); ?>
			    <?php foreach($model as $i=>$item): ?>
				<div class="row">
                    <div class="span5"><?php echo CHtml::activeLabelEx($item, $item->title.':', $defineLabel ? array('label' => $item->title) : array()); ?></div>
                    <div class="span5"><?php
	                    switch($item->options)
	                    {
			                case "INT":
		                        echo CHtml::activeTextField($item,"[$i]key_value",array('title'=>$item->helper_text, 'id'=>$item->key_name, 'pattern'=>'[0-9]+', 'title'=>'Only numbers are allowed'));
			                    break;

		                    case null:
		                    case "NULL":
		                    case "PINT":
			                    echo CHtml::activeTextField($item,"[$i]key_value",array('title'=>$item->helper_text, 'id'=>$item->key_name));
			                    break;

                            case "EMAIL":
                                echo CHtml::activeEmailField($item,"[$i]key_value",array('title'=>$item->helper_text, 'id'=>$item->key_name,'pattern'=> '^[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$'));
                                break;

		                    case "PASSWORD":
			                    echo CHtml::activePasswordField($item,"[$i]key_value",array('title'=>$item->helper_text, 'id'=>$item->key_name));
			                    break;

		                    case "BOOL":
			                    echo '<div class="onoff" id="'.$item->id.'" title="'.$item->helper_text.'"></div>'; //Create On/Off
			                    echo CHtml::activeHiddenField($item,"[$i]key_value");
			                    break;

		                    default:
			                    echo CHtml::activeDropDownList($item,"[$i]key_value",
				                    Configuration::getAdminDropdownOptions($item->options),
				                    array('title'=>$item->helper_text, 'id'=>$item->key_name));


	                    }
	                    ?></div>
                    <div class="span1">
	                    <?php if(!empty($item->helper_text)): ?><img src="<?= $this->assetUrl?>/img/help.png" title="<?= $item->helper_text ?>"/><?php endif; ?>
                    </div>
				</div>
			    <?php endforeach; ?>

            <p class="pull-right">
		        <?php $this->widget('bootstrap.widgets.TbButton', array(
			        'buttonType'=>'submit',
			        'label'=>'Save',
			        'type'=>'primary',
			        'size'=>'large',
		        )); ?>
	        </p>
		    <?php echo CHtml::endForm(); ?>
    </div>

</div>
