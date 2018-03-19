<?php   
    class Mypdo extends PDO {

        public function __construct($file = 'db_config.ini') {
            if (!$settings = parse_ini_file($file, TRUE)) 
                throw new exception('Unable to open ' . $file . '.');
            $dns = $settings['database']['driver'].':host='. 
                   $settings['database']['db_host'] .
                   ((!empty($settings['database']['port'])) ?
                   (';port=' . $settings['database']['port']) : '') .
                   ';dbname=' . $settings['database']['db_name'];
            parent::__construct($dns, $settings['database']['db_username'], 
                                      $settings['database']['db_password']);
        }

        public function getItems($sql) {
            $res = $this->prepare($sql);
            $res->execute();
            $items = $res->fetchAll(PDO::FETCH_ASSOC);
            return $items;
        }

        public function getItemById($sql) {
            return $res = $this->query($sql);
        }

        public function recordById($sql) {
            return $res = $this->query($sql);
        }
    }
?>