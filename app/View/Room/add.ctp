<div class="col-sm-12">



<?php

echo $this->Form->create('Room',array('role' => 'form'));

?>
<?php if(isset($single)): ?>
<fieldset disabled>
<div class="form-group">
      <label for="chosenProperty">Property</label>
      <select id="chosenProperty" name="data[Room][property_id]" class="form-control">
        <option value="<?php echo h($properties['Property']['id']);?>"><?php echo h($properties['Property']['title']); ?></option>
      </select>
    </div>
    </fieldset>
    
    <?php else: ?>
<div class="form-group">
<label for="Property">Choose Property</label>
<select class="form-control" name="data[Room][property_id]" id="Property">
<option value="">(choose one)</option>
  <?php foreach($properties as $key => $value): ?>
  <option value="<?php echo $value['Property']['id']; ?>"><?php echo $value['Property']['title']; ?></option>
  <?php endforeach; ?>
</select>
</div>

<?php endif; ?>

<?php


$fieldType = $this->Form->input('type',array(
                                              
                                              'label' => 'Type Of Room' , 
                                              'class' => 'form-control' 
                                              
                                              ));  
                                              
$fieldNumberOfBeds = $this->Form->input('number_of_beds',array(
                                              
                                              'label' => 'Number Of Beds' , 
                                              'class' => 'form-control' 
                                              
                                              ));
                                              
$fieldPrice = $this->Form->input('price',array(

                                              'label' => 'Price' ,
                                              'class' => 'form-control'

                                              ));

$fieldRoomNumber = $this->Form->input('room_number',array(

                                              'label' => 'Room Number' ,
                                              'class' => 'form-control'

                                              ));
                                                                                                                                                                                  

echo $this->Html->div('form-group',$fieldType);
echo $this->Html->div('form-group',$fieldNumberOfBeds);
echo $this->Html->div('form-group',$fieldRoomNumber);
echo $this->Html->div('form-group',$fieldPrice);


echo $this->Form->end(array('class'=>'btn btn-default','value' => 'Add'));

?>

</div>