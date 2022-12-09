<?php

use Service\Controller\Base\WebBase;
use Service\Model\Entity\File;

include_once 'front.init.php';
class Index extends WebBase {
    /**
     * @return void
     */
    public function execute(): void
    {
        try {
            $this->response->assign('text',"Hello Contents");
            $connection = $this->db->getConnection();
            if (is_null($connection)) {
                return ;
            }
            $databases = $connection->createSchemaManager()->listDatabases();
            $faker = Faker\Factory::create();
            foreach (range(0, 10) as $cnt) {
                $path = $faker->filePath();
                File::create([
                    'name' => basename($path),
                    'path' => $path,
                ]);
            }
            $this->response->assign('file1', new File(3));
            $this->response->assign('file2', File::getFiles());
            $this->response->assign('databases', $databases);
            $this->response->html("index.tpl");
        } catch (\Doctrine\DBAL\Exception $e) {
        }
    }
}

$index = new Index();
$index->execute();