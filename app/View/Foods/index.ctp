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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Nước Ép</th>
                </tr>

                <!-- Here is where we loop through our $posts array, printing out post info -->

                <?php foreach ($drinks as $food) : ?>
                    <tr>
                        <td><?php echo $food['Food']['id']; ?></td>
                        <td> duclt </td>
                        <td><?php echo $food['Food']['name']; ?></td>
                        <td><?php echo $food['Food']['name']; ?></td>
                        <td><?php echo $food['Food']['name']; ?></td>
                        <td><?php echo $food['Food']['name']; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
                <?php unset($food); ?>
            </table>
        </div>

        <div>
            <h3>Your order</h3>
            <div class="row">
                <div class="col-sm-6">
                    <table class="table table-striped table-bordered" id="mealsTable">
                        <tr>
                            <th>STT</th>
                            <th>Meal</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>STT</td>
                            <td>Meal</td>
                            <td><a class='deleteFood'>Xóa</a></td>

                        </tr>
                    </table>
                </div>

                <div class="col-sm-6">
                    <table class="table table-striped table-bordered" id="drinksTable">
                        <tr>
                            <th>STT</th>
                            <th>Meal</th>
                            <th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div> <button class="btn btn-primary" id="submit">Submit</button>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(".addDrink").click(function() {
            var $data = "<tr> <td> 1 </td> <td>".concat($(this).attr('name')).concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>");
            $('#drinksTable').append($data);
        });

        $(".addMeal").click(function() {
            var $data = "<tr> <td> 1 </td> <td>".concat($(this).attr('name')).concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>");
            $('#mealsTable').append($data);
        });

        $(".deleteFood").click(function() {
            console.log("hello");
            var $tr = $(this).parent().parent();
            console.log($tr);
            // var $table = $(this).parentsUntil("table").last().parent()[0];
            // console.log($table);
            $tr.remove($tr);
            // $tr.addClass('a');
        })

    });
</script>