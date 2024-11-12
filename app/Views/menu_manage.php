<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menus</title>
    <link rel="stylesheet" href="<?= base_url('path/to/bootstrap.css') ?>">
</head>
<body>
<div class="content-body">
<div class="container-fluid">
    <div class="container">
        <h1>Manage Menus</h1>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('home/updateMenuVisibility') ?>" method="post">
            <input type="hidden" name="id_menu" value="2">

            <div class="card mb-4">
                <div class="card-header">
                    <h5>Menu Visibility</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Show for Level 1</th>
                                <th>Show for Level 2</th>
                                <th>Show for Level 3</th>
                                <th>Show for Level 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Define the menu items you want to display
                            $menuItems = ['surat', 'data', 'setting','folder', 'datas']; 
                            foreach ($menuItems as $item): 
                            ?>
                            <tr>
                                <td><?= esc(ucfirst($item)) ?></td>
                                <td>
                                    <input type="checkbox" name="<?= esc($item) ?>_level1" 
                                           data-menu="<?= esc($item) ?>" 
                                           data-level="1" 
                                           <?= isset($menus[0]->$item) && $menus[0]->$item == 1 ? 'checked' : '' ?> 
                                           class="menu-checkbox">
                                </td>
                                <td>
                                    <input type="checkbox" name="<?= esc($item) ?>_level2" 
                                           data-menu="<?= esc($item) ?>" 
                                           data-level="2" 
                                           <?= isset($menus[1]->$item) && $menus[1]->$item == 1 ? 'checked' : '' ?> 
                                           class="menu-checkbox">
                                </td>
                                <td>
                                    <input type="checkbox" name="<?= esc($item) ?>_level3" 
                                           data-menu="<?= esc($item) ?>" 
                                           data-level="3" 
                                           <?= isset($menus[2]->$item) && $menus[2]->$item == 1 ? 'checked' : '' ?> 
                                           class="menu-checkbox">
                                </td>
                                <td>
                                    <input type="checkbox" name="<?= esc($item) ?>_level4" 
                                           data-menu="<?= esc($item) ?>" 
                                           data-level="3" 
                                           <?= isset($menus[3]->$item) && $menus[3]->$item == 1 ? 'checked' : '' ?> 
                                           class="menu-checkbox">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.menu-checkbox').change(function() {
        const menu = $(this).data('menu');
        const level = $(this).data('level'); // Now an integer (1, 2, or 3)
        const isChecked = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '<?= base_url('home/updateMenuVisibilityAjax') ?>',
            method: 'POST',
            data: {
                menu: menu,
                level: level, // Send the level as an integer
                visibility: isChecked
            },
            success: function(response) {
                if (response.status === 'success') {
                    console.log(response.message);
                } else {
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('An error occurred: ' + error);
            }
        });
    });
});
</script>


</body>
</html>
