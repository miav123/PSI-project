<tr <?php if($id == session('id')): ?>
    style="background-color: #fbeced;"
                 <?php endif; ?>>
    <th scope="row">
        
                <?php if($place == 1): ?>
                    <img src="/assets/images/place/first-place.png" alt="" style="height: 30px;"></th>
                <?php elseif($place == 2): ?>
                    <img src="/assets/images/place/second-place.png" alt="" style="height: 30px;"></th>
                <?php elseif($place == 3): ?>
                    <img src="/assets/images/place/third-place.png" alt="" style="height: 30px;"></th>
                <?php else: ?>
                    <?= $place ?>
                <?php endif; ?>
    </th>
        <td><?= $username ?></td>
        <td><?= $points ?></td>
</tr>