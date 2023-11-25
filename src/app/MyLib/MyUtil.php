<?php

namespace App\MyLib;

class MyUtil
{
    public static function checkGenre($value)
    {
        if ($value->genre === 101) { $genre = '異世界〔恋愛〕'; }
        if ($value->genre === 102) { $genre = '現実世界〔恋愛〕'; }
        if ($value->genre === 201) { $genre = 'ハイファンタジー〔ファンタジー〕'; }
        if ($value->genre === 202) { $genre = 'ローファンタジー〔ファンタジー〕'; }
        if ($value->genre === 301) { $genre = '純文学〔文芸〕'; }
        if ($value->genre === 302) { $genre = 'ヒューマンドラマ〔文芸〕'; }
        if ($value->genre === 303) { $genre = '歴史〔文芸〕'; }
        if ($value->genre === 304) { $genre = '推理〔文芸〕'; }
        if ($value->genre === 305) { $genre = 'ホラー〔文芸〕'; }
        if ($value->genre === 306) { $genre = 'アクション〔文芸〕'; }
        if ($value->genre === 307) { $genre = 'コメディー〔文芸〕'; }
        if ($value->genre === 401) { $genre = 'VRゲーム〔SF〕'; }
        if ($value->genre === 402) { $genre = '宇宙〔SF〕'; }
        if ($value->genre === 403) { $genre = '空想科学〔SF〕'; }
        if ($value->genre === 404) { $genre = 'パニック〔SF〕'; }
        if ($value->genre === 9901) { $genre = '童話〔その他〕'; }
        if ($value->genre === 9902) { $genre = '詩〔その他〕'; }
        if ($value->genre === 9903) { $genre = 'エッセイ〔その他〕'; }
        if ($value->genre === 9904) { $genre = 'リプレイ〔その他〕'; }
        if ($value->genre === 9909) { $genre = 'その他〔その他〕'; }
        if ($value->genre === 9801) { $genre = 'ノンジャンル〔ノンジャンル〕'; }
        return $genre;
    }
}
