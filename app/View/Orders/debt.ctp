<div class="row">
    <h3>Danh sách chưa trả tiền</h3>
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
                    <th>Action</th>
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
                        <?php if( $user_id == $order['Order']['user_id'] || $role == 'admin') { 
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