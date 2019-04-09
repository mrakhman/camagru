<form method="post">
    <input type="submit" name="setup" id="setup" value="Create database camagru_mrakhman2"/><br/>
</form>

<?php
include_once "database.php";

function setup_db()
{
    $script_path = '/Users/mrakhman/Mamp/apache2/htdocs/42_mrakhman_mamp/camagru/config/';

    $command = 'mysql'
        . ' --host=localhost'
        . ' --user=root'
        . ' --password=123456'
//    . ' --database=' . $vals['db_name']
        . ' --execute="SOURCE ' . $script_path
    ;

    $output = shell_exec($command . '/setup.sql"; echo $?');

    if ($output !== NULL)
    {
        echo "Database successfully created!";
        echo '<br><a href="http://localhost:8080/index.php">Click here</a>';
        return TRUE;
    }

    else
    {
        echo 'Something went wrong';
        return FALSE;
    }
}

if(array_key_exists('setup', $_POST))
{
    setup_db();
}
