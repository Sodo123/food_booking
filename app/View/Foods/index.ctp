<div class="row">
    <div class="col-sm-6">
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
    </div>
    <div class="col-sm-6">
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
</div>

<script>
    $(document).ready(function() {
        $(".addDrink").click(function() {
            var $data = "<tr> <td>".concat($(this).attr('name')).concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>");
            $('#drinksTable').append($data);
        });

        $(".addMeal").click(function() {
            var $data = "<tr> <td>".concat($(this).attr('name')).concat("</td> <td><a class='deleteFood'>Xóa</a></td> </tr>");
            $('#mealsTable').append($data);
        });

        // $(".deleteFood").click(function() {
        //     console.log("hello");
        //     var $tr = $(this).parent().parent();
        //     console.log($tr);
        //     $tr.remove();
        // });

        $(".table").on('click', '.deleteFood', function(){
            var $tr = $(this).parent().parent();
            console.log($tr);
            $tr.remove();
        });

    });
</script>