<form>
    <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">選択したジャンルを検索</label>
    @include('shared.sort')
    <div class="relative z-10 flex space-x-3 p-3 bg-white border rounded-lg shadow-lg shadow-gray-100 dark:bg-slate-900 dark:border-gray-700 dark:shadow-gray-900/[.2]">
        <div class="flex-[1_0_0%]">
            <select name="genre" id="genre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>ジャンル</option>
                <option value= "101">異世界〔恋愛〕</option>
                <option value= "102">現実世界〔恋愛〕</option>
                <option value= "201">ハイファンタジー〔ファンタジー〕</option>
                <option value= "202">ローファンタジー〔ファンタジー〕</option>
                <option value= "301">純文学〔文芸〕</option>
                <option value= "302">ヒューマンドラマ〔文芸〕</option>
                <option value= "303">歴史〔文芸〕</option>
                <option value= "304">推理〔文芸〕</option>
                <option value= "305">ホラー〔文芸〕</option>
                <option value= "306">アクション〔文芸〕</option>
                <option value= "307">コメディー〔文芸〕</option>
                <option value= "401">VRゲーム〔SF〕</option>
                <option value= "402">宇宙〔SF〕</option>
                <option value= "403">空想科学〔SF〕</option>
                <option value= "404">パニック〔SF〕</option>
                <option value= "9901">童話〔その他〕</option>
                <option value= "9902">詩〔その他〕</option>
                <option value= "9903">エッセイ〔その他〕</option>
                <option value= "9904">リプレイ〔その他〕</option>
                <option value= "9909">その他〔その他〕</option>
                <option value= "9801">ノンジャンル〔ノンジャンル〕</option>
            </select>
        </div>
        <div class="flex-[0_0_auto]">
            <button class="w-[46px] h-[46px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
</form>
