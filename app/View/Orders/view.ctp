<div class="row">
    <h3>Lịch sử đặt cơm</h3>
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
                    <th>Date</th>
                </tr>

                <!-- Here is where we loop through our $posts array, printing out post info -->

                <?php $i=1; foreach ($orders as $order) : ?>
                    <tr>
                        <td><?php echo $i; $i++ ?></td>
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
                        <td><?php echo $order['Order']['created'] ?></td>
                        
                    </tr>
                <?php endforeach; ?>
                <?php unset($order); ?>
            </table>
</div>