<?php include(ROOT.'/views/layouts/header.php');?>
    <div class=".col-9 p-2">
        <h2 class="blog-post-title">Пользователи</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Логин</th>
                <th scope="col">Пароль</th>
                <th scope="col">ФИО</th>
            </tr>
            </thead>
            <tbody>

            <?
            foreach ($userList as $item) {
                ?>
                <tr>
                    <td><?=$item->id?></td>
                    <td><?=$item->email?></td>
                    <td><?=$item->login?></td>
                    <td><?=$item->password?></td>
                    <td><?=$item->name?></td>
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