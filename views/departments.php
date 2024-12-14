<!DOCTYPE html>
<html lang="en">
<?php require_once 'partials/header.php'; ?>

<body>
<?php require_once 'partials/navbar.php'; ?>
    <main class="courses-tables">
    <div class="flex-title">
            <h1>Available Departments</h1>
            <?php if (Auth::check() && $user->role == 'admin') { ?>
                <a class="action primary" href="index.php?departments&create">Create a department</a>
            <?php } ?>
        </div>
        <!-- Dynamic table of departments -->
        <table class="tblCourses">
            <thead>
                <tr>
                    <th scope="col">Department name</th>
                    <th scope="col">Department code</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department) { ?>
                    <tr>
                        <td><?= $department->dept_name ?></td>
                        <td><span aria-describedby="<?= $department->dept_id ?>_desc"><?= $department->dept_id ?></span></td>
                        <?php if ($user->role == 'admin') { ?>
                            <td><a href="index.php?departments&edit=<?= $department->dept_id ?>">Edit</a></td>
                            <td><a href="index.php?departments&delete=<?= $department->dept_id ?>">Delete</a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        


    </main>
    <?php require_once 'partials/footer.php'; ?>
</body>

</html>