<?php
    namespace app\Repositories\Interfaces;
    use App\models\Rdv;

    interface RdvInterface{

        public function save(Rdv $rdv);
        public function all();
        public function getRdvCount($id);
        public function getById(int $id);
       public function getByUserId(int $id); 
        public function update(Rdv $rdv);
        public function delete(int $id);



    }
