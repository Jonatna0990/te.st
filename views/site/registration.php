<?php include(ROOT.'/views/layouts/header.php');?>

<?
$title = "Регистрация";
?>



<div class="container">
    <div class="row">
        <div class="col-md-11 order-md-11">
            <h4 class="mb-3"><?=$title?>

            </h4>
            <form  method="post" class="needs-validation" validate action="#">
                <div class="mb-3">
                    <label for="login">Логин</label>
                    <input name="login" type="text" class="form-control" id="login" placeholder="Например, admin" required>
                    <div class="invalid-feedback">
                        Введите Логин
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password">Пароль</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Например, 123" required>
                    <div class="invalid-feedback">
                        Введите Пароль
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name">ФИО</label>
                    <label for="name"></label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Например, Иванов Иван Иванович" required>
                    <div class="invalid-feedback">
                        Введите ФИО
                    </div>
                </div>
                <hr class="mb-4">
                <input name="submit" class="btn btn-primary btn-lg btn-block" value="<?=$title?>" type="submit"/>
            </form>
        </div>
    </div>
</div>
<? include(ROOT.'/views/layouts/footer.php'); ?>
