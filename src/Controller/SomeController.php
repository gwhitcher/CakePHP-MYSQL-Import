<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class SomeController extends AppController
{
    public function mysql_import() {
        $db = ConnectionManager::get('default');

        $dir = getcwd();
        //print_r($dir); Uncomment to see your full directory path.  You can adjust it accordingly below.

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { //WINDOWS
            $part = explode('\\', $dir);
            $sql_url = '' . $part[0] . '\\' . $part[1] . '\\' . $part[2] . '\\' . $part[3] . '\\' . $part[4] . '\\';
        } else { //LINUX
            $part = explode('/', $dir);
            $sql_url = '' . $part[0] . '/' . $part[1] . '/' . $part[2] . '/' . $part[3] . '/' . $part[4] . '/';
        }

        $statement = file_get_contents($sql_url.''.'mysql.sql'); //Replace cakeblog.sql with the name of your SQL file.
        $db->query($statement); //Execute SQL file.

        $full_url = 'http://'.$_SERVER['HTTP_HOST'].''; //You can replace this with whatever URL you want or remove it for a CakePHP route.
        return $this->redirect($full_url);
        return $this->Flash->success(__('MYSQL File Imported.'));
    }
}