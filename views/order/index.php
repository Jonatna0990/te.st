<?php include(ROOT.'/views/layouts/header.php');?>
<div class=".col-9 p-2">
    <h2 class="blog-post-title">Заказы</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Id пользователя</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>

        <?
        foreach ($orderList as $item) {
            ?>
            <tr>
                <td><?=$item->id?></td>
                <td><?=$item->user_id?></td>
                <td><?=$item->price?></td>
            </tr>
            <?
        }
        ?>
        </tbody>
    </table>
</div>
    <nav>
        <?=$pagination->get() ?>
    </nav>
<? include(ROOT.'/views/layouts/footer.php'); ?>