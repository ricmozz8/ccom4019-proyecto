<!DOCTYPE html>
<html lang="en">
<?php require_once 'partials/header.php'; ?>

<body>
    <?php require_once 'partials/navbar.php'; ?>
    <main class="courses-tables">
        <div class="flex-title">
            <h1>Users</h1>
            <?php if (Auth::check() && Auth::user()->role == 'admin')  { ?>
                <a class="action primary" href="index.php?users&create">Create a user</a>
            <?php } ?>
        </div>
        <!-- Dynamic table of users -->
        <table class="tblCourses">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Department</th>
                    <th scope="col">Role</th>
                    <th scope="col">Last Login</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->name ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= Department::findBy(['dept_id' => $user->dept_id])->dept_name ?></td>
                        <td><?= $user->role ?></td>
                        <td><?= $user->last_login ?></td>
                        <?php if ($currentUser->role == 'admin') { ?>
                            <td><a href="users/<?= $user->user_id ?>">Edit</a></td>
                            <td><a href="users/<?= $user->user_id ?>">Delete</a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </main>
    <?php require_once 'partials/footer.php'; ?>
</body>

</html>