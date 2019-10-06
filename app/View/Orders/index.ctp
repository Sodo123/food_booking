<div class="row">
    <div class="col-sm-3">
        <h3>List Meals</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($meals as $food) : ?>
                <tr>
                    <td><?php echo $food['Food']['id']; ?></td>
                    <td><?php echo $food['Food']['name']; ?></td>
                    <td>
                        <a class="addMeal" name="<?php echo $food['Food']['name']; ?>" id="<?php echo $food['Food']['id']; ?>">Add</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php unset($food); ?>
        </table>

        <h3>List Drinks</h3>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we loop through our $posts array, printing out post info -->

            <?php foreach ($drinks as $food) : ?>
                <tr>
                    <td><?php echo $food['Food']['id']; ?></td>
                    <td><?php echo $food['Food']['name']; ?></td>
                    <td>
                        <a class="addDrink" name="<?php echo $food['Food']['name']; ?>" id="<?php echo $food['Food']['id']; ?>">Add</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php unset($food); ?>
        </table>
    </div>
    <div class=" col-sm-9">
        <div>
            <h3>Orders</h3>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Stt</th>
                    <th>User</th>
                    <th>Món 1</th>
                    <th>Món 2</th>
                    <th>Món 3</th>
                    <th>Món 4</th>
                    <th>Nước ép</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <!-- Here is where we loop through our $posts array, printing out post info -->

                <?php $i=1; foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['Order']['id']; $i++ ?></td>
                        <td><?php echo $order['Order']['customer_name'] ?></td>
                        <?php for($j=0; $j < 4; $j++) :  ?>
                            <td><?php 
                                if( count($order['Food']) > $j) 
                                    if( $order['Food'][$j]['category_id'] == 1) 
                                        echo $order['Food'][$j]['name'] ?>
                            </td>
                        <?php endfor; ?>
                        <td><?php echo $order['Order']['drinks'] ?></td>
                        <td><?php echo $order['Order']['note'] ?></td>
                        <td class="text-danger"><?php echo $order['Order']['status'] ?></td>
                        <?php if( $user_id == $order['Order']['user_id']) { 
                            echo $this->Form->create('Order', array('action' => 'delete'));
                            echo '<td> <button type="submit">Xóa</button></td>'; ?>
                            <input type='hidden' name='id' value='<?php echo $order['Order']['id'] ?>'>
                        <?php
                            echo $this->Form->end();
                        } else echo '<td></td>';
                        ?>
                        
                    </tr>
                <?php endforeach; ?>
                <?php unset($order); ?>
            </table>
        </div>

        <?php echo $this->Form->create('Order', array('action' => 'add')); ?>
        <div>
            <h3>Create order</h3>
            <div class="row">
                <div class="col-sm-6">
                    <table class="table table-striped table-bordered" id="mealsTable">
                        <tr>
                            <th>Meal</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>

                <div class="col-sm-6">
                    <table class="table table-striped table-bordered" id="drinksTable">
                        <tr>
                            <th>Drink</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_name">Tên KH</label>
                        <input type="text" class="form-control" placeholder="Nhập thêm order cho người khác" name="customer_name">
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <input type="text" class="form-control" placeholder="Nhiều cơm, nhiều thức ăn ..."
                        name="note">
                    </div>
                </div>
            </div>

        </div> 
        <?php
            echo $this->Form->end('Submit'); 
         ?>
        
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".addDrink").click(function() {
            var $data = "<tr> <td>".concat($(this).attr('name'))
            .concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>")
            .concat("<input type='hidden' name='foods[]' value='")
            .concat($(this).attr('id'))
            .concat("'/>");
            console.log($data);
            $('#drinksTable').append($data);
        });

        $(".addMeal").click(function() {
            var $data = "<tr> <td>".concat($(this).attr('name'))
            .concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>")            
            .concat("<input type='hidden' name='foods[]' value='")
            .concat($(this).attr('id'))
            .concat("'/>");
            console.log($data);
            $('#mealsTable').append($data);
        });

        $(".table").on('click', '.deleteFood', function(){
            var $tr = $(this).parent().parent();
            console.log($tr);
            $tr.remove();
        });

    });
</script>