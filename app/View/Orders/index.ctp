<div class="row">
    <div class="col-sm-4">
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
    <div class=" col-sm-8">
        <div>
            <h3>Orders</h3>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Order</th>
                    <th>User</th>
                    <th>Món 1</th>
                    <th>Món 2</th>
                    <th>Món 3</th>
                    <th>Món 4</th>
                    <th>Nước ép</th>
                    <th>Trạng thái</th>
                </tr>

                <!-- Here is where we loop through our $posts array, printing out post info -->

                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $order['Order']['id']; ?></td>
                        <td><?php echo $order['Order']['customer_name'] ?></td>
                        <td><?php if( count($order['Food']) > 0) echo $order['Food'][0]['name'] ?></td>
                        <td><?php if( count($order['Food']) > 1) echo $order['Food'][1]['name'] ?></td>
                        <td><?php if( count($order['Food']) > 2) echo $order['Food'][2]['name'] ?></td>
                        <td><?php if( count($order['Food']) > 3) echo $order['Food'][3]['name'] ?></td>
                        <td><?php if( count($order['Food']) > 4) echo $order['Food'][4]['name'] ?></td>
                        <td class="text-danger"><?php echo $order['Order']['status'] ?></td>
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
        </div> 
            <!-- <button class="btn btn-primary" id="submit">Submit</button> -->
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