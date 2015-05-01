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

        //Remove or comment out these two lines to use this script for version control.
        $statement = file_get_contents($sql_url.''.'/mysql/initial.sql'); //Replace initial.sql with the name of your SQL file.
        $db->query($statement); //Execute SQL file.

        /* Uncomment for version control!
        $versions_array = scandir($sql_url.'/mysql/'); //If you need to reverse the order add ", 1" after "/mysql/'"
        $clean_dir = array('.', '..');
        $versions_array_cleaned = array_diff(scandir($versions_array), $clean_dir);
        foreach ($versions_array_cleaned as $version) {
            $statement = file_get_contents($sql_url.''.'/mysql/'.$version.'');
            $db->query($statement); //Execute version
        }
        */

        $full_url = 'http://'.$_SERVER['HTTP_HOST'].''; //You can replace this with whatever URL you want or remove it for a CakePHP route.
        return $this->redirect($full_url);
        return $this->Flash->success(__('MYSQL File Imported.'));
    }
}