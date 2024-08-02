<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    public function showList() {
        //インスタンス生成
        $model = new Article();
        $articles = $model->getList();
        //list.blade.phpの呼び出し
        return view('list', ['articles' => $articles]);
    }
    //登録画面表示用
    public function showRegistForm() {
        return view('regist');
    }
    //登録処理用
    public function registSubmit(ArticleRequest $request) {
        // トランザクション開始
        DB::beginTransaction();
        try {
            // 登録処理呼び出し
            $model = new Article();
            $model->registArticle($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
        //処理が完了したらregistにリダイレクト
        return redirect(route('regist'));
    //画像登録・保存
    use App\Models\Article;
    use Illuminate\Support\Facades\DB;
    public function(Request $request) {
            // ①画像ファイルの取得
            $image = $request->file('image');
            // ②画像ファイルのファイル名を取得
            $file_name = $image->getClientOriginalName();
            // ③storage/app/public/imagesフォルダ内に、取得したファイル名で保存
            $image->storeAs('public/images', $file_name);
            // ④データベース登録用に、ファイルパスを作成
            $image_path = 'storage/images/' . $file_name;
            // モデルのインスタンス化
            $model = new Article();
            // トランザクション開始
            DB::beginTransaction();
            try {
                // ⑤モデルのregistArticle関数を呼び出し。
                $model->registArticle($image_path);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                // 例外処理を追加する場合はここに記述
            }
        }
}
}
?>