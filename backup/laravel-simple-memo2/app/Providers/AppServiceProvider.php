<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Memo;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //すべてのメゾットが呼ばれる前に先に呼ばれるメゾット
        view()->composer('*', function($view) {
            $query_tag = \Request::query('tag');
            //もしクエリパラメータtagがあれば
            if(!empty($query_tag)){
            //タグで絞り込み
                $memos = Memo::select('memos.*')
                ->leftJoin('memo_tags', 'memo_tags.memo_id', '=', 'memos.id')
                ->where('memo_tags.tag_id', '=', $query_tag)
                ->where('user_id', '=', \Auth::id())
                ->whereNull('deleted_at')
                ->orderBy('updated_at','DESC') //降順
                ->get();

            }else{
            //タグがなければすべて取得    
                $memos = Memo::select('memos.*')
                ->where('user_id', '=', \Auth::id())
                ->whereNull('deleted_at')
                ->orderBy('updated_at','DESC') //降順
                ->get();
            }
            
            $tags = Tag::where('user_id', '=', \Auth::id())
            ->whereNull('deleted_at')
            ->orderBy('id','DESC') //降順
            ->get();

            $view->with('memos', $memos)->with('tags', $tags);
        });
    }
}
