<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Article extends Model
{//情報取得用
    public function getList() {
        $articles = DB::table('articles')->get();
        return $articles;
    }
    //情報登録用
    public function registArticle($data) {
    //登録処理
        DB::table('articles')->insert([
        'title' => $data->title,
        'url' => $data->url,
        'comment' => $data->comment,]);
        } 
    }
    use Illuminate\Support\Facades\DB;
    public function registArticle($image_path){
        DB::table('articles')->insert(
            ['image_file' => $image_path]);
}
?>