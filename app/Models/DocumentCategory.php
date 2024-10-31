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
                5 => '慶弔見舞申請書',
                6 => '資格申請書',
                7 => '出張旅費申請書',
                8 => '通勤費精算書',
                9 => '年末年始手当申請書',
                10 => '旅費支給申請書',
            ],
            '技術' => [
                1 => '月間作業報告書',
                2 => '週間作業報告書',
                3 => '社外研修報告書',
                4 => '出張計画書',
                5 => '出張報告書',
            ],
            '総務' => [
                1 => '休職届',
                2 => '自己申請書',
                3 => '作業確認20日〆',            
                4 => '作業確認31日〆',
            ],
            'その他' => [
                1 => '勤務予測',
            ],
        ];
    }
}