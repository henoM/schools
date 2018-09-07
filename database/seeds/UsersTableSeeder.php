<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * DB table name
     *
     * @var string
     */
    protected $table;

    /**
     * CSV filename
     *
     * @var string
     */
    protected $filename;
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct(){

        $this->table = 'users';
        $this->filename = database_path() . '/csv/admins.csv';

    }
    public function run()
    {
        DB::table($this->table)->delete();
        $seedData = $this->seedFromCSV($this->filename, ',');
        DB::table($this->table)->insert($seedData);
    }

    /**
     * Collect data from a given CSV file and return as array
     *
     * @param $filename
     * @param string $deliminator
     * @return array|bool
     */
    private function seedFromCSV($filename, $delimitor = ",")
    {
        if(!file_exists($filename) || !is_readable($filename))
        {
            return FALSE;
        }

        $header = NULL;
        $datas = array();

        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $delimitor)) !== FALSE)
            {

                if(!$header) {

                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);

                }
            }
            fclose($handle);

        }
        foreach ( $data as $key => $value){

            $data[$key]['password'] = bcrypt($data[$key]['password'] );
        }
         return $data;
    }
}
