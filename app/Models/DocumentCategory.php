<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    public static function getCategoriesWithItems()
    {
        return [
            '経理' => [
                1 => '経費申請書',
                2 => '通勤手当申請書',
                3 => '駐在旅費仮払申請書',
                4 => '稟議書',
            ],
            '技術' => [
                1 => '技術書',
                2 => '技術資料',
                3 => '技術仕様書',
                4 => '技術マニュアル',
            ],
            '総務' => [
                1 => '社用車申請書',
                2 => '社用車返却報告書',
                3 => '社用車使用申請書',
                4 => '社用車使用報告書',
            ],
            'その他' => [
                1 => 'その他1',
                2 => 'その他2',
                3 => 'その他3',
                4 => 'その他4',
            ],
        ];
    }
}