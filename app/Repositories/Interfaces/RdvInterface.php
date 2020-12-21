<?php
    namespace app\Repositories\Interfaces;
    use App\models\Rdv;

    interface RdvInterface{

        public function save(Rdv $rdv);
        public function all();
        public function getById(int $id);
        public function update(Rdv $rdv);
        public function delete(int $id);



    }
