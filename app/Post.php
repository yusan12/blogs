<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function comments(){
        return $this->hasMany('App\Comment'); 
    }

    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public static function replaceUrl($post)
    {
        $posts = explode(PHP_EOL, $post); //PHP_EOLは,改行コードをあらわす.改行があれば分割する
        $pattern = '/^https?:\/\/[^\s  \\\|`^"\'(){}<>\[\]]*$/'; //正規表現パターン
        $replacedposts = array(); //空の配列を用意

        foreach ($posts as $value) {
            $replace = preg_replace_callback($pattern, function ($matches) {
            //postが１行ごとに正規表現にmatchするか確認する
                if (isset($matches[1])) {
                    return $matches[0]; //$matches[0] がマッチした全体を表す
                }
            //既にリンク化してあれば置換は必要ないので、配列に代入
                return '<a href="' . $matches[0] . '" target="_blank" rel="noopener">' . $matches[0] . '</a>';
            }, $value);
            $replacedposts[] = $replace;
            //リンク化したコードを配列に代入
        }
        return implode(PHP_EOL, $replacedposts);
        //配列にしたpostを文字列にする
    }

}
