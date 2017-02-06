<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 1/7/17
 * Time: 1:40 PM
 */

namespace App\MultiInheritance;


trait RepositoriesTrait
{
    public function getByIdentify($identify)
    {
        return $this->makeModel()
            ->where('identify', $identify)->limit(1)
            ->get();
    }

    public function destroy($id, $skip = 0)
    {
        $result = $this->delete($id);
        if ($result) {
            if ($skip !== 0) {
                $data = $this->makeModel()
                    ->skip($skip)->take(1)
                    ->orderBy('id', 'DESC')
                    ->get();
                if($data) {
                    return $data[0];
                } return false;
            }
            return $result;
        }
        return false;
    }
}